<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Tambahkan whitelist ini:
    protected $fillable = [
        'client_name',    // <-- Pastikan ada
        'client_contact', // <-- Tambahkan ini
        'ktp_image_path',
        'pickup_date',
        'return_date',
        'total_days',
        'grand_total',
        'status'
    ];

    // Relasi ke detail (agar bisa dipanggil dengan $booking->details)
    public function details()
    {
        return $this->hasMany(BookingDetail::class);
    }
}