<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->get('search', '');

        if (!empty($searchTerm)) {
            $students = Student::where('first_name', 'like', "%{$searchTerm}%")
                ->orWhere('last_name', 'like', "%{$searchTerm}%")
                ->orWhere('email', 'like', "%{$searchTerm}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $students = Student::orderBy('created_at', 'desc')->get();
        }

        return view('students.index', compact('students', 'searchTerm'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|max:100|unique:students',
            'phone'      => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address'    => 'nullable|string|max:500',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('message', __('messages.student_added'))
            ->with('message_type', 'success');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|max:100|unique:students,email,' . $id,
            'phone'      => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address'    => 'nullable|string|max:500',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('message', __('messages.student_updated'))
            ->with('message_type', 'success');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('message', __('messages.student_deleted'))
            ->with('message_type', 'success');
    }
}
