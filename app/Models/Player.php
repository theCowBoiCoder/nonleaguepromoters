<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'bio',
        'profile_image',
        'country',
        'county',
        'step_level',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'facebook_url',
        'is_public'
    ];

    public function histories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PlayerHistory::class,'user_id','id')->orderBy('season','DESC');
    }
}
