<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds. File generated with artisan command: php artisan make:seed *filename*
     */
    public function run(): void
    { //Filling Student table with dummy data
        DB::table('students')->insert([
            'name' => 'Test User',
            'grade' => '11',
            'teacher_id' => 1,
            'interests'=> 'goofing and dily daling around',
        ]);

    }
}
