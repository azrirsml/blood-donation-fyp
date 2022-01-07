<?php

namespace App\Http\Controllers;

use App\Models\BloodCamp;
use App\Models\Hospital;
use App\Models\State;
use Illuminate\Http\Request;

class BloodCampController extends Controller
{
    public function index()
    {
        $bloodCamps = BloodCamp::orderBy('created_at', 'desc')->paginate(10);

        return view('blood-camps.index', compact('bloodCamps'));
    }

    public function show(BloodCamp $blood_camp)
    {
        return view('blood-camps.show', compact('blood_camp'));
    }

    public function create()
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        return view('blood-camps.create', compact('states', 'hospitals'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'state_id' => 'required',
            'hospital_id' => 'required',
            'venue' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'date' => 'required'
        ]);

        BloodCamp::create($data);

        return redirect()->route('blood-camps.index')->with('success', 'Successfully added');
    }

    public function edit(BloodCamp $blood_camp)
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        return view('blood-camps.edit', compact('blood_camp', 'states', 'hospitals'));
    }

    public function update(BloodCamp $blood_camp, Request $request)
    {
        $data = $request->validate([
            'state_id' => 'required',
            'hospital_id' => 'required',
            'venue' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'date' => 'required'
        ]);

        $blood_camp->update($data);
        
        return redirect()->route('blood-camps.index')->with('success', 'Successfully updated');
    }

    public function destroy(BloodCamp $blood_camp)
    {
        $blood_camp->delete();
        
        return redirect()->route('blood-camps.index')->with('success', 'Successfully deleted');
    }
}
