<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    // Whitelist untuk detail item
    protected $fillable = [
        'booking_id',
        'camera_id',
        'qty',
        'subtotal'
    ];

    // Relasi ke Kamera (agar admin bisa melihat nama kamera yang disewa)
    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }
}