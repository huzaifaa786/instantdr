<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['patientname','time','date','fees','hospital_id','doctor_id','user_id'];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function speciality()
    {
        
        return $this->doctor->speciality->name;
    }
}
