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
        'user_id',
        'looking_for_a_club',
        'preferred_position',
        'preferred_foot',
        'height',
        'step_level',
        'age'
    ];

    protected $guarded = ['*'];

    protected $appends = ['age'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function contracts()
    {
        return $this->hasOne(PlayerContract::class, 'player_id', 'id');
    }

    public function histories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PlayerHistory::class, 'player_id', 'id')->orderBy('season', 'DESC');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
