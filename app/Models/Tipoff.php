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
        'state_crime',
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
    ];

}
