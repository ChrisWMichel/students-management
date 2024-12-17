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
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        Gate::authorize('student_access');

        $studentsQuery = Student::search($request);

        $studentsResource = StudentResource::collection($studentsQuery->paginate(10));
        $classRooms = ClassRoomResource::collection(ClassRoom::all());

        return inertia('Students/index', [
            'students' => $studentsResource,
            'search' => $request->search ?? '',
            'classRooms' => $classRooms,
            'class_id' => $request->class_id ?? '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('student_create');

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
        Gate::authorize('student_create');

        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        Gate::authorize('student_edit');

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
        Gate::authorize('student_edit');

        $student->update($request->validated());


        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Gate::authorize('student_delete');

        $student->delete();

        return redirect()->route('students.index');
    }
}
