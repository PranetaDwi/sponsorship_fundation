<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconKontraprestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kontraprestasi_id', 'icon_photo_kontraprestasi_id'
    ];
}
