<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';

    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'school_id', 'id'); // Change 'school_id' to 'id'
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'school_name');
    }
    public function absenceRequests()
    {
        return $this->hasMany(AbsenceRequest::class);
    }
}
