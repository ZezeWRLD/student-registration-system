<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Database\Factories\TeacherFactory;

#[UseFactory(TeacherFactory::class)]

class Teacher extends Model
{
    protected $fillable = [ //Defining data that can be parsed
        'name',
        'surname',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
        protected static function factory()
    {
        return TeacherFactory::new();
    }

}
