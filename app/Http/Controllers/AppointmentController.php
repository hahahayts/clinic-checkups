<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Appointments/Index', [
            'appointments' => Appointment::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_time' => 'required|date'
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending'
        ]);

        return redirect()->route('dashboard')->with('success', 'Appointment booked successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['appointment_time' => 'required|date']);

        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        $appointment->update(['appointment_time' => $request->appointment_time]);

        return redirect()->route('dashboard')->with('success', 'Appointment updated successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('dashboard')->with('success', 'Appointment canceled successfully!');
    }
}
