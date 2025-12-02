<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        // Ambil booking pending dan yang sedang aktif
        $pendingBookings = Booking::with('details.camera')->where('status', 'pending')->get();
        $activeBookings = Booking::with('details.camera')->whereIn('status', ['approved'])->get();
        $completedBookings = Booking::with('details.camera')->whereIn('status', ['completed', 'rejected'])->get();
        
        return view('admin.dashboard', compact('pendingBookings', 'activeBookings', 'completedBookings'));
    }

    // LOGIKA 1: APPROVE (Kurangi Stok)
    public function approveBooking($id) {
        DB::beginTransaction();
        try {
            $booking = Booking::with('details')->findOrFail($id);

            if ($booking->status !== 'pending') {
                return redirect()->back()->with('error', 'Booking sudah diproses sebelumnya.');
            }

            foreach ($booking->details as $detail) {
                $camera = Camera::lockForUpdate()->find($detail->camera_id);
                
                if ($camera->quantity < $detail->qty) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Stok ' . $camera->name . ' kurang!');
                }

                $camera->decrement('quantity', $detail->qty);
            }

            $booking->update(['status' => 'approved']);
            DB::commit();
            return redirect()->back()->with('success', 'Booking disetujui & stok berkurang.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // LOGIKA 2: REJECT
    public function rejectBooking($id) {
        $booking = Booking::findOrFail($id);
        if ($booking->status == 'pending') {
            $booking->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Booking ditolak.');
        }
        return redirect()->back()->with('error', 'Gagal menolak booking.');
    }

    // LOGIKA 3: COMPLETE (Kembalikan Stok)
    public function completeBooking($id) {
        DB::beginTransaction();
        try {
            $booking = Booking::with('details')->findOrFail($id);

            if ($booking->status !== 'approved') {
                return redirect()->back()->with('error', 'Booking harus disetujui dulu.');
            }

            foreach ($booking->details as $detail) {
                Camera::where('id', $detail->camera_id)->increment('quantity', $detail->qty);
            }

            $booking->update(['status' => 'completed']);
            DB::commit();
            return redirect()->back()->with('success', 'Booking selesai. Stok kembali.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error sistem.');
        }
    }
}