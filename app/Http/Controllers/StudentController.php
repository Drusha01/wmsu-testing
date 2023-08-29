<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function profile()
    {
        return view('student.profile');
    }

    public function application()
    {
        return view('student.application');
    }

    public function registration()
    {
        return view('student.registration');
    }

    public function schedule()
    {
        return view('student.schedule');
    }

    public function results()
    {
        return view('student.results');
    }
}
