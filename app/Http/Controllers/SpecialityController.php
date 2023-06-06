<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        Speciality::create($request->all());
        return redirect()->back();
    }
    public function index()
    {
        // Retrieve all users
        $speciality = Speciality::all();
        // dd($category);
        return view('admin.speciality.all-speciality', ['specialities' => $speciality]);
    }
    public function show()
    {
        // Retrieve all users
        $speciality = Speciality::all();
        return view('admin.doctor.createe', ['specialities'=> $speciality]);
    }
    public function update(Request $request)

    {
        $speciality = Speciality::find($request->id);
        $speciality->update($request->all());
        return redirect()->back()->with('cong', 'speciality edit successfully');
    }
    public function destroy($id)
    {
        $speciality = Speciality::find($id);
        $speciality->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'speciality deleted successfully');
    }
}
