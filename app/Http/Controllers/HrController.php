<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Attendance;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class HrController extends Controller
{
    public function hr()
    {
        return view('hr.home');
    }

    public function updateStatus(Request $request)
    {
        $doctorId = $request->input('doctor_id');
        $attendance = Attendance::find($doctorId);

        if ($attendance) {
            // Toggle the status
            $attendance->status = $attendance->status === 'present' ? 'absent' : 'present';
            $attendance->save();
            return redirect()->back()->with('success', 'Status updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update status');
        }
    }
    public function sendAbsentDoctorsToSchools(Request $request)
    {
        // Retrieve the selected school ID from the form
        $selectedSchool = $request->input('school_name');

        // Find the school based on the selected ID
        $school = School::find($selectedSchool);

        if ($school) {
            // Fetch absent doctors associated with the selected school
            $absentDoctors = Doctor::where('school_id', $selectedSchool)
                ->whereHas('attendances', function ($query) {
                    $query->where('status', 'Absent');
                })
                ->select('name', 'email')
                ->get();

            // Pass the data to the view
            return view('school.absentDoctors', [
                'school' => $school,
                'absentDoctors' => $absentDoctors
            ]);
        } else {
            return redirect()->back()->with('error', 'Failed to find the selected school');
        }
    }
}