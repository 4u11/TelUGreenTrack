<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trashcan extends Model
{
    //
    protected $fillable = [
        'location',
        'waste_type',
        'capacity',
        'fill_level',
        'test_var'
    ];
}
