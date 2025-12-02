<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;

    // INI YANG WAJIB ADA (Whitelist Kolom)
    // Tanpa ini, Laravel menolak menyimpan data dari form (create/update)
    protected $fillable = [
        'name',
        'category',
        'description',
        'quantity',
        'price_per_day',
        'image_path'
    ];
}