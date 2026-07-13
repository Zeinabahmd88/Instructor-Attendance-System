<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\AbsenceRequest;

class DoctorController extends Controller
{
    public function home()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $absenceRequest = AbsenceRequest::where('doctor_id', $doctor->id)->whereNull('reason')->first();
        return view('doctor.home', compact('absenceRequest'));
    }

    public function submitAbsentReason(Request $request, AbsenceRequest $absenceRequest)
    {
        $absenceRequest->update([
            'reason' => $request->input('reason')
        ]);

        return redirect()->route('doctor.home')->with('success', 'Your reason for absence has been submitted.');
    }
}
