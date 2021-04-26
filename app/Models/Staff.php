<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'user_id',
        'gender',
        'dob',
        'bio',
        'looking_for_a_club',
        'profile_image',
        'country',
        'county',
        'region',
        'step_level',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'facebook_url',
        'is_public',
        'age',
        'role',
        'qualification'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contracts()
    {
        return $this->hasOne(PlayerContract::class, 'player_id', 'id');
    }
}
