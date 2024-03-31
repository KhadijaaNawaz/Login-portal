<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student; // Import the Student model

class StudentController extends Controller
{
    public function index()
    {
        // // Fetch all students
        $students = Student::all();
        
        // // Pass the students data to the view
         return view('students.index', ['students' => $students]);
       
    }

    public function create()
    {
        // Return the create view
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        // Create a new Student
        $Student = new Student();
        $Student->name = $request->name;
        $Student->email = $request->email;
        $Student->number = $request->number;
        $Student->password = $request->password;
        $Student->save(); 

        // Redirect back with success message
        return redirect()->back()->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        // Find the Student by ID
        $Student = Student::findOrFail($id);
        
        // Return the edit view with Student data
        return view('students.update', compact('Student'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        // Find the Student by ID
        $Student = Student::findOrFail($id);
        
        // Update Student data
        $Student->name = $request->name;
        $Student->email = $request->email;
        $Student->number = $request->number;
        $Student->password = $request->password;
        $Student->save(); 

        // Redirect back with success message
        return redirect()->back()->with('success', 'Student Updated successfully!');
    }

    public function destroy($id)
    {
        // Find the Student by ID and delete it
        $Student = Student::findOrFail($id);
        $Student->delete();
        
        // Redirect back with success message
        return redirect()->back()->with('success', 'Student Deleted successfully!');
    }
}
