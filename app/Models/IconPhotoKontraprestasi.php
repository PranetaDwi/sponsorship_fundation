<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconPhotoKontraprestasi extends Model
{
    use HasFactory;

    protected $fillable = [
         'photo_file'
    ];

    public function kontraprestasies()
    {
        return $this->hasMany(Kontraprestasi::class, 'icon_photo_kontraprestasi_id', 'id');
    }
}
