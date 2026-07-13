<?php
namespace App\Models;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'doctor'; // Specify the correct table name
   
    public function routeNotificationForMail($notification)
    {
        // Return the doctor's email address.
        return $this->email;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
  
  
    public function attendances()
    {
        return $this->hasMany(Attendance::class,'doctor_id','id');
    }
   
    public function absenceRequests()
    {
        return $this->hasMany(AbsenceRequest::class);
    }

 
}
