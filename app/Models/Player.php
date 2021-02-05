<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed dob
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'bio',
        'preferred_position',
        'profile_image',
        'country',
        'county',
        'step_level',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'facebook_url',
        'is_public',
        'age'
    ];

    protected $guarded = ['*'];

    protected $appends = ['age'];

    public function contract()
    {
        return $this->hasOne(PlayerContract::class,'user_id','id');
    }

    public function histories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PlayerHistory::class, 'user_id', 'id')->orderBy('season', 'DESC');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
