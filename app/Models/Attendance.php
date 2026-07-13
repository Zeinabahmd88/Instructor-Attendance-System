<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model{
    use HasFactory;
    protected $fillable = [
      'doctor_id', 'name', 'email', 'campus', 'course', 'section', 'block', 'time', 'status', 'school_name'];
       
        public function doctor()
        {
            return $this->belongsTo(Doctor::class,'doctor_id','id');
        }
    
          public function school()
           {
          return $this->belongsTo(School::class, 'school_id');
            }
}