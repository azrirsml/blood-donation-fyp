<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\DonationType;
use App\Models\Status;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['status', 'donationType'])->orderBy('created_at', 'desc')->paginate(8);

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $donationTypes = DonationType::select(['name', 'id'])->get();

        return view('appointments.create', compact('donationTypes'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create(
            $request->validated() + [
            'status_id' => Status::where('name', 'Pending')->first()->id ?? null,
            'remark' => 'Waiting Approval',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Successfully added');
    }

    public function edit(Appointment $appointment)
    {
        $donationTypes = DonationType::select(['name', 'id'])->get();

        $statuses = Status::select(['name', 'id'])->get();

        return view('appointments.edit', compact('donationTypes', 'statuses', 'appointment'));
    }

    public function update(Appointment $appointment, StoreAppointmentRequest $request)
    {
        $appointment->update(
            $request->validated() + [
                'status_id' => $request->status_id,
                'remark' => $request->remark
            ]);

        return redirect()->route('appointments.index')->with('success', 'Successfully updated');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Successfully deleted');
    }
}
