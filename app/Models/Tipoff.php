<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoff extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'knowledge',
        'crime_state',
        'address',
        'city',
        'state',
        'postal',
        'location',
        'datetime',
        'description',
        'assessment',
        'person_id',
        'status',
        'user_id'
    ];
}
