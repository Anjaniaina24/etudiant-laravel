<?php

namespace App\Http\Controllers;

use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        $recentStudents = Student::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('dashboard', compact('students', 'recentStudents'));
    }
}