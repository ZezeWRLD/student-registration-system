<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//File generated with artisan command: php artisan make:model *filename*
class Student extends Model
{
   protected $fillable = [ //Defining data that can be parsed
        'name',
        'grade',
        'teachername',
        'interests',
    ];

}
