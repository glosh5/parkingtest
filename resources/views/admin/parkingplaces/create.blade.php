@extends('layouts.master-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Parking Location</li>
        </ol>
    </nav>

   
  
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Parking Location</h6>
                        <form method="POST" action="{{URL::to($userURL.'/parking/creates')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Location Name" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Available Spots</label>
                                        <input type="number"  name="spots" class="form-control" placeholder="Enter Number" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Price per hour</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
                                    </div>
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
                            <button type="submit" class="btn btn-primary submit">Add Place</button>
                        </form>
                      
                </div>
            </div>
        </div>
    </div>
    




</div>
@endsection