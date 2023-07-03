<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\city;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function store(Request $request)
    {
        Hospital::create($request->all());
        return redirect()->back();
    }
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospital.allhospitals', ['hospitals' => $hospitals,]);
    }
    public function update(Request $request)

    {
        $hospital = Hospital::find($request->id);
        $hospital->update($request->all());
        return redirect()->back()->with('cong', 'product edit successfully');
    }
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'product deleted successfully');
    }
    public function city(Request $request)
    {
        city::create($request->all());
        return redirect()->back();
    }
    public function ambulance(Request $request)
    {
        Ambulance::create($request->all());
        return redirect()->back();
    }
}
