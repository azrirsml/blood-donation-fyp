<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\Hospital;
use App\Models\State;
use Illuminate\Http\Request;

class BloodStockController extends Controller
{
    public function index()
    {
        $bloodStocks = BloodStock::orderBy('created_at', 'desc')->paginate(10);

        return view('blood-stocks.index', compact('bloodStocks'));
    }

    public function show(BloodStock $blood_stock)
    {
        return view('blood-stocks.show', compact('blood_stock'));
    }

    public function create()
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        $bloodTypes = BloodType::all(['name', 'id']);

        return view('blood-stocks.create', compact('states', 'hospitals', 'bloodTypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'state_id' => 'required',
            'hospital_id' => 'required',
            'blood_type_id' => 'required',
            'donation_type' => 'required',
            'status' => 'required',
        ]);

        BloodStock::create($data);

        return redirect()->route('blood-stocks.index')->with('success', 'Successfully added');
    }

    public function edit(BloodStock $blood_stock)
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        $bloodTypes = BloodType::all(['name', 'id']);

        return view('blood-stocks.edit', compact('blood_stock', 'states', 'hospitals', 'bloodTypes'));
    }

    public function update(BloodStock $blood_stock, Request $request)
    {
        $data = $request->validate([
            'state_id' => 'required',
            'hospital_id' => 'required',
            'blood_type_id' => 'required',
            'donation_type' => 'required',
            'status' => 'required',
        ]);

        $blood_stock->update($data);
        
        return redirect()->route('blood-stocks.index')->with('success', 'Successfully updated');
    }

    public function destroy(BloodStock $blood_stock)
    {
        $blood_stock->delete();
        
        return redirect()->route('blood-stocks.index')->with('success', 'Successfully deleted');
    }
}
