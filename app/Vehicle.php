<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'page_type', 'step_name', 'step_title', 'step_details', 'status', 'sort'
    ];
}
