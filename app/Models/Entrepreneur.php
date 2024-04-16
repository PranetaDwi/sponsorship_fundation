<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mitra_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sponsors(){
        return $this->hasMany(Sponsor::class, 'entrepreneur_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id');
    }
}
