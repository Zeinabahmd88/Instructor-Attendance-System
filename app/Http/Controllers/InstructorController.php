<?php
namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Attendance;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    // public function show(){
    //     $data=Doctor::all();
    //     return view('registrar.home',compact('data'));
    //   }
    public function storeAttendance(Request $request)
    {
        foreach ($request->attendances as $attendanceData) {
            Attendance::create([
                'doctor_id' => $attendanceData['id'],
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