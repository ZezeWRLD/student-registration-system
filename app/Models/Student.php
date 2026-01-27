<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//File generated with artisan command: php artisan make:model *filename*
class Student extends Model
{
   protected $fillable = [ //Defining data that can be parsed
        'name',
        'grade',
        'teacher_id',
        'interests',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
