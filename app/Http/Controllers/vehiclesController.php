<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class vehiclesController extends Controller
{
    //
    public function show()
    {
        $vehicles = Vehicle::all();
        $newVehicle = [];
        foreach ($vehicles as $vehicle) {
            $user = User::where('id', $vehicle['user_id'])->first();
            $entities = [
                'plateNumber' => $vehicle['plateNumber'],
                'type' => $vehicle['type'],
                'owner' => $user->fname . " " . $user->lname,
                'id' => $vehicle['id']
            ];
            array_push($newVehicle, $entities);
        }
        return view('admin.showvechicles', compact('newVehicle'));
    }


    public function create(Request $request)
    {

        $vehicle = Vehicle::create([
            'plateNumber' => $request->plate,
            'user_id' => $request->owner,
            'type' => $request->Type

        ]);
        if ($vehicle) {
            $sweet = array('title' => 'Vehicle Created successfully', 'message' => 'Vehicle  is Created');
            return redirect()->back()->with('sweet', $sweet);
        }
    }

    public function index()
    {
        $users = User::where('type', 'VehicleOwner')->get();
        return view('admin.createvehicles', compact('users'));
    }

    public function showedit($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $Owner = User::where('id', $vehicle->user_id)->first();
        $users = User::where('type', 'VehicleOwner')->get();
        return view('admin.vehicleEdit', compact('vehicle', 'users', 'Owner'));
    }

    public function edit(Request $request, $id)
    {
        $update = Vehicle::where('id', $id)->update([

            'plateNumber' => $request->plate,
            'user_id' => $request->owner,
            'type' => $request->Type

        ]);

        if ($update) {
            $sweet = array('title' => 'Vehicle Updated successfully', 'message' => 'Vehicle  is Update');
            return redirect()->back()->with('sweet', $sweet);
        }
    }

    public function delete($id)
    {

        $user=Vehicle::where('id',$id)->delete();
        if($user)
        {
            $sweet = array('title' => 'Vehicle Delete successfully', 'message' => 'Your Vehicle is Deleted');
            return redirect()->back()->with('sweet', $sweet);
        }
    }
}
