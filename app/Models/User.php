<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_been_changed',
        'gender',
        'dob',
        'bio',
        'county',
        'region',
        'profile_image',
        'twitter_url',
        'instagram_url',
        'facebook_url',
        'youtube_url',
        'is_public'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function player(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Player::class, 'user_id', 'id');
    }

    public function staff(){
        return $this->hasOne(Staff::class,'user_id','id');
    }

}
