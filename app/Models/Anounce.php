<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anounce extends Model
{
    /** @use HasFactory<\Database\Factories\AnounceFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price'
    ];
}
