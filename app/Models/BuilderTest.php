<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuilderTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'builder',
    ];

    protected $casts = [
        'builder' => 'array',
    ];
}