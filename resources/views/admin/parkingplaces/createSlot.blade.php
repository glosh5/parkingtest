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
                    <h6 class="card-title">Add Parking Location</h6>
                        <form method="POST" action="{{URL::to($userURL.'/parking/slots/create/'.$parkings->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{$parkings->name}}" disabled>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Available Spots</label>
                                        <input type="number"  name="spots" class="form-control" placeholder="{{$parkings->Available_spot}}" disabled>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                @for($i=1;$i<=$parkings->Available_spot;$i++)
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Slot {{$i}} code</label>
                                        <input type="text" name="codes[]" class="form-control" placeholder="Enter Code" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Slot {{$i}} type</label>
                                        <select class="form-select" placeholder="Choose Type" name="categories[]" required>
                                            <option>Choose Type</option>
                                            <option value="truck">Truck</option>
                                            <option value="bike">Bike</option>
                                            <option value="car">Car</option>
                                            <option value="bus">Bus</option>


                                            
                                        </select>
                                    </div>
                                </div>
                                @endfor<!-- Col -->
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
                            <button type="submit" class="btn btn-primary submit">Add Slot</button>
                        </form>
                      
                </div>
            </div>
        </div>
    </div>
    




</div>
@endsection