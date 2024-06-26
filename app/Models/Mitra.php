<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'address', 'city', 'province', 'photo_file'
    ];

    public function entrepreneurs()
    {
        return $this->hasMany(Entrepreneur::class, 'mitra_id', 'id');
    }
}
