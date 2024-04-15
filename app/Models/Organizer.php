<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'organization_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->hasMany(Event::class, 'organizer_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
