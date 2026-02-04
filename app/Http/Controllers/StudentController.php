<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentMail;

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
    public function store(Request $request)
    {  //checks if the request body data meets requirments before saving them into the database
        $request->validate([
         "name"=> "required|string|max:255",
         "grade"=> "required|integer|min:1|max:12",
         "teacher_id"=> "required|integer|exists:teachers,id",
         "interests" => "required|string|max:500",
        ]);
        //trys to create a new instance of student, initialize values, and save the new student; failure returns an error
        try{
            $student = new Student();
            $student->name = $request->input('name');
            $student->grade = $request->input('grade');
            $student->teacher_id = $request->input('teacher_id');
            $student->interests = $request->input('interests');

            $student->save();

        }catch(\Exception $e){
            return back()->with("error", $e->getMessage());
        }

        //sends an email notification upon successful creation of a new student
        try{
            Mail::to(user()->email)->send(new StudentMail($student, 'created'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send student creation email: ' . $e->getMessage());
        }

        //upon successfull saving/creation/storing the user is redirected to a show view where they can view the student they created
        return redirect()->route('students.show',$student)->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.show', compact('student', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $oldteacher = Teacher::find($student->teacher_id);
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers', 'oldteacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {   //Validation proccess is the same as the store function, refer to the store function
         $request->validate([
         "name"=> "required|string|max:255",
         "grade"=> "required|integer|min:1| max:12",
         "teacher_id"=> "required|integer|exists:teachers,id",
         "interests" => "required|string|max:500",
        ]);

        //after validation, the current student information is changed to the incoming changes from the request body same try-catch logic from store function
        try{
        $student->name = $request->input('name');
        $student->grade = $request->input('grade');
        $student->teacher_id = $request->input('teacher_id');
        $student->interests = $request->input('interests');
        $student->save();
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
        //sends an email notification upon successful update of a student
          try{
            Mail::to(user()->email)->send(new StudentMail($student, 'updated'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send student update email: ' . $e->getMessage());
        }

        //User redirected to a view showing the updated student
        return redirect()->route('students.show', $student)->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {//Student is deleted; alternatvely a soft delete should be used but this was the easiest to do without creating additional tables
        $studentData = $student->toArray();
        $student->delete();
        //sends an email notification upon successful deletion of a student
        $dummyStudent = (object) [
            'name' => $studentData['name'],
        ];

        try{
            Mail::to(user()->email)->send(new StudentMail($dummyStudent, 'deleted'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send student deletion email: ' . $e->getMessage());
        }

        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}
