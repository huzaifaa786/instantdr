<?php

namespace App\Http\Controllers;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function store(Request $request)
    {
        $credentials = ApiValidate::register($request, Doctor::class);

        // Retrieve the selected days from the request
        $selectedDays = $request->input('days');

        // Define an array to store the days with their selected status
        $days = [];

        // Define an array of all the days of the week
        $allDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        // Iterate over all the days of the week
        foreach ($allDays as $day) {
            // Check if the day exists in the selected days array
            $isSelected = in_array(ucfirst($day), $selectedDays);

            // Assign the selected status to the corresponding day
            $days[$day] = $isSelected;
        }

        // Add the 'days' attribute to the credentials array
        $credentials['days'] = $days;

        // Create a new instance of the Doctor model with the updated credentials
        Doctor::create($credentials);

        return redirect()->back();
    }



    public function fetch()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.alldoctors', ['doctors' => $doctors,]);
    }
    public function customUpdate(Request $request)

    {
        $doctor = Doctor::find($request->id);
        $doctor->update($request->all());
        return redirect()->back()->with('cong', 'product edit successfully');
    }
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
