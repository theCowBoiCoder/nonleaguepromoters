<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seos';

    protected $fillable = ['route', 'meta_title', 'meta_keywords', 'meta_description'];
}
