<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function index()
    {
        return inertia('Admin/Dashboard', [
            'users' => User::all(),
            'appointments' => Appointment::all()
        ]);
    }
    public function users()
    {
        return inertia('Admin/Users', ['users' => User::all()]);
    }
    public function appointments()
    {
        return inertia('Admin/Appointments', ['appointments' => Appointment::all()]);
    }
}