<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBloodStockRequest;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\DonationType;
use App\Models\Hospital;
use App\Models\State;
use App\Models\StockStatus;
use Illuminate\Http\Request;

class BloodStockController extends Controller
{
    public function index()
    {
        $bloodStocks = BloodStock::with(['stockStatus', 'donationType'])->orderBy('created_at', 'desc')->paginate(10);

        return view('blood-stocks.index', compact('bloodStocks'));
    }

    public function create()
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        $bloodTypes = BloodType::all(['name', 'id']);

        $donationTypes = DonationType::all(['name', 'id']);

        $statuses = StockStatus::all(['name', 'id']);

        return view('blood-stocks.create', compact('states', 'hospitals', 'bloodTypes', 'donationTypes', 'statuses'));
    }

    public function store(StoreBloodStockRequest $request)
    {
        BloodStock::create($request->validated());

        return redirect()->route('blood-stocks.index')->with('success', 'Successfully added');
    }

    public function edit(BloodStock $blood_stock)
    {
        $states = State::all(['name', 'id']);

        $hospitals = Hospital::all(['name', 'id']);

        $bloodTypes = BloodType::all(['name', 'id']);

        $donationTypes = DonationType::all(['name', 'id']);

        $statuses = StockStatus::all(['name', 'id']);

        return view('blood-stocks.edit', compact('blood_stock', 'states', 'hospitals', 'bloodTypes', 'donationTypes', 'statuses'));
    }

    public function update(BloodStock $blood_stock, StoreBloodStockRequest $request)
    {
        $blood_stock->update($request->validated());
        
        return redirect()->route('blood-stocks.index')->with('success', 'Successfully updated');
    }

    public function destroy(BloodStock $blood_stock)
    {
        $blood_stock->delete();
        
        return redirect()->route('blood-stocks.index')->with('success', 'Successfully deleted');
    }
}
