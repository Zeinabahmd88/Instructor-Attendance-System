<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\School;
use App\Models\AbsenceRequest;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    // public function show($schoolName)
    // {
        
    //     $school = School::where('school_name', $schoolName)->firstOrFail();
    //     $school->setSchoolName($school->school_name);
        
    // }

    public function receiveAbsentDoctors()
    {
        // Retrieve absent doctors associated with the current school
        $schoolName = auth()->user()->school_name; // Assuming school name is stored in the authenticated user's data
        $absentDoctorss = Attendance::where('school_name', $schoolName)
                                    ->where('status', 'absent')
                                    ->get();
    
        // Return a view with the absent doctors data
        return view('school.home', ['absentDoctorss' => $absentDoctorss]);
    }
    public function requestAbsentReason(Request $request, Doctor $doctor)
    {
        $school = Auth::user()->school;

        AbsenceRequest::create([
            'doctor_id' => $doctor->id,
            'school_id' => $school->id,
        ]);

        return redirect()->back()->with('success', 'Form request sent to the doctor.');
    }
}
    