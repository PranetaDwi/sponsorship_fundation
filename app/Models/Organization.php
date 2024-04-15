<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'address', 'city', 'province', 'photo_file'
    ];

    public function organizers(){
        return $this->hasMany(Organizer::class, 'organization_id', 'id');
    }
}
