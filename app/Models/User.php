<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, 
    HasFactory, 
    Notifiable;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->account_id = generate_account_id();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'email',
        'remember_token',
        'password',
        'email_verified_at',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function organizer()
    {
        return $this->hasOne(Organizer::class);
    }

    public function entrepreneur()
    {
        return $this->hasOne(Entrepreneur::class);
    }
}
