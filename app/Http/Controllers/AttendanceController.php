<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'selectedTime' => 'required|string',
            'attendances' => 'required|array',
            'attendances.*.doctor_id' => 'required|exists:doctor,id',
            'attendances.*.name' => 'required|string',
            'attendances.*.email' => 'required|email',
            'attendances.*.campus' => 'required|string',
            'attendances.*.course' => 'required|string',
            'attendances.*.section' => 'required|string',
            'attendances.*.block' => 'required|string',
            'attendances.*.time' => 'required|string',
            'attendances.*.status' => 'required|string',
            'attendances.*.school_name' => 'nullable|string',
        ]);

        foreach ($validated['attendances'] as $attendanceData) {
            Attendance::create([
                'doctor_id' => $attendanceData['doctor_id'],
                'name' => $attendanceData['name'],
                'email' => $attendanceData['email'],
                'campus' => $attendanceData['campus'],
                'course' => $attendanceData['course'],
                'section' => $attendanceData['section'],
                'block' => $attendanceData['block'],
                'time' => $attendanceData['time'],
                'date' => now(),
                'status' => $attendanceData['status'],
                'school_name' => $attendanceData['school_name'] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Attendance submitted successfully!');
    }
}
