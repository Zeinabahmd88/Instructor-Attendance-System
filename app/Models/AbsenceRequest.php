<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'school_id',
        'reason',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
