<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\School;
use App\Models\Attendance;

use App\Models\AbsenceRequest;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();
        $usertype = $user->usertype;

        if ($usertype == '0') {
            $absentDoctors = Attendance::where('status', 'absent')->get();
            $presentDoctors = Attendance::where('status', 'present')->get();
            $schools = School::all(); // Retrieve all schools
            $absenceRequests = AbsenceRequest::all();

            return view('hr.home', compact('absentDoctors', 'presentDoctors', 'schools','absenceRequests'));
       
        } elseif ($usertype == '3') {
            $data = Doctor::all(); 
                        return view('registrar.home', compact('data'));
        } elseif ($usertype == '2') {
            $school = $user->school; // Get the associated school

            if ($school) {
                // Fetch absent doctors associated with the authenticated school
                $absentDoctors = Doctor::where('school_id', $school->id)
                    ->whereHas('attendances', function ($query) {
                        $query->where('status', 'Absent');
                    })
                    ->get();

                // Fetch absence requests for the school
                $absenceRequests = AbsenceRequest::where('school_id', $school->id)->whereNotNull('reason')->get();

                return view('school.home', compact('absentDoctors', 'school', 'absenceRequests'));
             } else {
                return redirect()->back()->with('error', 'School not found for this user.');
            }
        } elseif ($usertype == '1') {
            $doctor = Doctor::where('user_id', $user->id)->first();
            $absenceRequest = AbsenceRequest::where('doctor_id', $doctor->id)->whereNull('reason')->first();
            return view('doctor.home', compact('absenceRequest'));
        }
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
        public function sendReasonForm(Request $request)
    {
        // Retrieve the doctor ID and reason from the form submission
        $doctorId = $request->input('doctor_id');
        $reason = $request->input('reason');

        // Find the doctor based on the ID
        $doctor = Doctor::find($doctorId);

        if ($doctor) {
            // Logic to send the reason form to the specific doctor goes here
            // You can send an email, create a notification, or update the doctor's record with the reason
            // For example, you can update the doctor's record with the reason for absence
            $doctor->reason_for_absence = $reason;
            $doctor->save();

            return redirect()->back()->with('success', 'Reason for absence sent successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to find the doctor.');
        }
    }
    public function submitAbsenceStatus(Request $request, $id)
    {
        $absenceRequest = AbsenceRequest::find($id);
    
        if ($absenceRequest) {
            // Update the status of the absence request
            $absenceRequest->status = $request->input('status');
            $absenceRequest->save();    
            return redirect()->back()->with('success', 'Absence status submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to find the absence request.');
        }
    }


}