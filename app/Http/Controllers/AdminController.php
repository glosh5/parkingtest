<?php

namespace App\Http\Controllers;

use App\Models\parking_record;
use App\Models\parkingLocation;
use App\Models\parkingslots;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $parkedvehicles=parking_record::all();
        $parked=[];
        foreach($parkedvehicles as $parkedvehicle)
        {
            $user=User::where('id',$parkedvehicle->recordedBy)->first();
            $vehicleowner=Vehicle::where('id',$parkedvehicle->vehicle_id)->first();
            $owner=User::where('id',$vehicleowner->user_id)->first()??"";
            $entities=[
                'id'=>$parkedvehicle['id'],
                'vehiclename'=>$vehicleowner->plateNumber,
                'checkin'=>$parkedvehicle->checkin,
                'checkout'=>$parkedvehicle->checkout,
                'recordedBy'=>$user->fname." ".$user->lname,
                'status'=>$parkedvehicle->status,
                'owner'=>$owner->fname." ".$owner->lname??""
                
            ];
            array_push($parked,$entities);
        }
        
        $parking=parkingLocation::all()->count();
        if(Auth::user()->type == 'gatePerson')
        {
            $parkingslots=parkingslots::where('id',Auth::user()->location_id)->count();
            
        }
        $vehicles=Vehicle::all()->count();
        $parkingslots=parkingslots::all()->count();
        return view('admin.dashboard',compact('parked','vehicles','parking','parkingslots'));
    }
    public function index2(Request $request)
    {
        //

      $location=parkingLocation::all();
        return view('admin.index',compact('location'));
    }
}
