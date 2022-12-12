<?php

namespace App\Http\Controllers;

use App\Models\parking_record;
use App\Models\parkingLocation;
use App\Models\parkingslots;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class parkedcarController extends Controller
{
    //
    public function index(Request $request)
    {
        $vehicles = Vehicle::all();
        $locations = [];
        if(Auth::user()->type != 'Admin')
        {
            $locationss = parkingslots::where('status', 'Available')->where('location_id',Auth::user()->location_id)->get();

        }
        else
        {  $locationss = parkingslots::where('status', 'Available')->get();

        }
        foreach ($locationss as $location) {
            $locationName = parkingLocation::where('id', $location['location_id'])->first();
            $entities = [
                'id' => $location['id'],
                'name' => $locationName->name . " - " . $location['code']
            ];
            array_push($locations, $entities);
        }
        // dd($locationss);
        return view('admin.parkedcars.index', compact('vehicles', 'locations'));
    }
    public function create(Request $request)
    {

        $create = parking_record::create([
            'recordedBy' => Auth::user()->id,
            'vehicle_id' => $request->vehicle,
            'splot_id' => $request->spot,
            'checkin' => Carbon::now()

        ]);
        if ($create) {
            $update = parkingslots::where('id', $request->spot)->update(['status' => 'occupied']);
            if ($update) {
                $sweet = array('title' => 'Parking record Created successfully', 'message' => 'Parking Record is Created');
                return redirect()->back()->with('sweet', $sweet);
            }
        }
    }

    public function show()
    {
        $parkedVehicles = parking_record::all();
        $parkedVehicle = [];
        foreach ($parkedVehicles as $vehicle) {
            $indVehicle = Vehicle::where('id', $vehicle['vehicle_id'])->first();
            $owner = User::where('id', $indVehicle->user_id)->first();
            $spot = parkingslots::where('id', $vehicle['splot_id'])->first();
            $parkingPlace = parkingLocation::where('id', $spot->location_id)->first();
            $recordedBy = User::where('id', $vehicle['recordedBy'])->first();
            $entities = [
                'name' => $indVehicle->plateNumber,
                'checkin' => $vehicle['checkin'],
                'checkout' => $vehicle['checkout'],
                'owner' => $owner->fname . ' ' . $owner->lname,
                'spot' => $parkingPlace->name . "-" . $spot->code,
                'recordedBy' => $recordedBy->fname . ' ' . $recordedBy->lname,
                'status' => $vehicle['status'],
                'fees' => $vehicle['fees'],
                'id' => $vehicle['id'],
                'vehicleId' => $indVehicle->id
            ];
            array_push($parkedVehicle, $entities);
        }
        return view('admin.parkedcars.show', compact('parkedVehicle'));
    }
    public function checkout($recordId, $vehicleId)
    {

        $updateRecordStatus = parking_record::where('id', $recordId)->update(['status' => 'checkedout']);
        if ($updateRecordStatus) {

            $parkedVehicles = parking_record::where('id', $recordId)->first();
            $spot = parkingslots::where('id', $parkedVehicles->splot_id)->first();
            $parkingPlace = parkingLocation::where('id', $spot->location_id)->first();
            $now = Carbon::now();
            $parkedVehicleTime = $parkedVehicles->checkin;

            $time = $now->diff($parkedVehicleTime)->format('%H');
            $int = (int)$time;
            if ($int == 0) {
                $fees = $parkingPlace->Price_per_hourly;
                $updateRecordStatus = parking_record::where('id', $recordId)->update(['fees' => $fees, 'checkout' => Carbon::now()]);
                $spot = parkingslots::where('id', $parkedVehicles->splot_id)->update(['status' => 'Available']);
            }
            if ($int > 0) {
                $fees = $int * $parkingPlace->Price_per_hourly;
                $updateRecordStatus = parking_record::where('id', $recordId)->update(['fees' => $fees, 'checkout' => Carbon::now()]);
                $spot = parkingslots::where('id', $parkedVehicles->splot_id)->update(['status' => 'Available']);
            }
            $sweet = array('title' => 'Vehicle Checkout successfully', 'message' => 'Vehicle Checked Successfully');
            return redirect()->back()->with('sweet', $sweet);
        }
    }
}
