@extends('layouts.master-admin')
@section('content')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </nav>

   
  
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Parked Car</h6>
                    <!--<ol class="breadcrumb">-->
                    <!--    <li class="breadcrumb-item"><a href="#">For ordinary user</a></li>-->
                    <!--    <li class="breadcrumb-item active" aria-current="page"><a href="{{URL::to('/admin')}}">For new user</a></li>-->
                    <!--</ol>-->
                        <form method="POST" action="{{URL::to($userURL.'/parkedCar/create')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Vehicles</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="vehicle">
                                            <option value="">Select Vehicle</option>
                                            @foreach($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plateNumber}}</option>
                                        
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <select class="form-select" data-width="100%" id="location" name="spot">
                                            <option value="">Select Location</option>
                                            @foreach($locations as $vehicle)
                                            <option value="{{$vehicle['id']}}">{{$vehicle['name']}}</option>
                                        
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    {{-- <div class="mb-3">
                                        <label class="form-label">Spots</label>
                                        <select class="form-control" data-width="100%" id="spot">
                                            <option value="">Select Spot</option>
                                           
                                    
                                        </select>
                                    </div> --}}
                                </div><!-- Col -->
                                {{-- <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">R</label>
                                        <input type="text" class="form-control" placeholder="Enter state">
                                    </div>
                                </div><!-- Col --> --}}
                                {{-- <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select class="form-select" placeholder="Choose Type" name="Type" required>
                                            <option>Choose Type</option>
                                            <option value="gatePerson">gatePerson</option>
                                            <option value="VehicleOwner">VehicleOwner</option>
                                            
                                        </select>

                                    </div>
                                </div><!-- Col --> --}}
                            </div><!-- Row -->
                            <div class="row">
                                {{-- <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                </div><!-- Col --> --}}
                                {{-- <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required>
                                    </div>
                                </div><!-- Col --> --}}
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-primary submit">Add Record</button>
                        </form>
                      
                </div>
            </div>
        </div>
    </div>
    




</div>
@endsection