<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

//File generated with artisan command: php artisan make:controller *filename* --model=Student --resource
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        //selects all students from the database and returns them a collection
        $students = Student::paginate(10);
        return view("students.index", compact("students", "teachers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view("students.create", compact("teachers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {  //checks if the request body data meets requirements before saving them into the database
            $student = Student::create($request->validated());

            $student->name = $request->input('name');
            $student->grade = $request->input('grade');
            $student->teacher_id = $request->input('teacher_id');
            $student->interests = $request->input('interests');
            $student->save();

        //upon successful saving/creation/storing the user is redirected to a show view where they can view the student they created
        return redirect()->route('students.show',$student)->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // $teachers = Teacher::all();
        $student::with('teacher')->get();
        return view('students.show', compact('student'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student::with('teacher')->get();
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Student $student)
    {   //Validation process is the same as the store function, refer to the store function
        if ($request->validated() === false) {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
        //after validation, the current student information is changed to the incoming changes from the request body same try-catch logic from store function
        $student->name = $request->input('name');
        $student->grade = $request->input('grade');
        $student->teacher_id = $request->input('teacher_id');
        $student->interests = $request->input('interests');
        $student->save();

        //User redirected to a view showing the updated student
        return redirect()->route('students.show', $student)->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {//Student is deleted; alternatively a soft delete should be used but this was the easiest to do without creating additional tables
        $student->delete();

        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}
