<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorAll()
    {
        $doctors = Doctor::all();
        return Api::setResponse('doctors', $doctors);
    }
    public function doctorSpeciality()
    {
        $speciality = Speciality::all();
        return Api::setResponse('specialities', $speciality);
    }
    public function doctorShow( Request $request)
    {
        $doctor = Doctor::find($request->id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        return response()->json($doctor);
    }
}
