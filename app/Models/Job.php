<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, CisRowIdTrait, SoftDeletes;

    protected $fillable = [
        'name',
        'fahrzeug',
        'is_fuehrungskraft',
    ];

    protected $casts = [
        'is_fuehrungskraft' => 'boolean',
    ];
}
