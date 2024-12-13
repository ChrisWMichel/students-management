<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Resources\SectionResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\ClassRoomResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //$students = Student::with(['class', 'section'])->get();

        //$studentsResource = StudentResource::collection($students);
        $studentsResource = StudentResource::collection(Student::paginate(10));

        return inertia('Students/index', [
            'students' => $studentsResource,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ClassRoomResource::collection(ClassRoom::all());

        return inertia('Students/create', [
            'classes' => $classes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = ClassRoomResource::collection(ClassRoom::all());

        return inertia('Students/edit', [
            'student' => StudentResource::make($student),
            'classes' => $classes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //dd($student);
        $student->update($request->validated());


        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
