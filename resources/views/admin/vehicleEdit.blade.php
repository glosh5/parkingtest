@extends('layouts.master-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Vehicle</li>
        </ol>
    </nav>

   
  {{-- vehicles/create' --}}
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Vehicle</h6>
                        <form method="POST" action="{{URL::to($userURL.'/vehicles/edit2/'.$vehicle->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Plate Number</label>
                                        <input type="text" name="plate" class="form-control"  value="{{$vehicle->plateNumber}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Vehicle Owner</label>
                                        <select class="form-select" placeholder="Choose Type" name="owner" required>
                                            <option  value="{{$Owner->id}}">{{$Owner->fname." ".$Owner->lname}}</option>
                                            @foreach($users as $user)

                                            <option value="{{$user->id}}">{{ $user->fname." ".$user->lname }}</option>
                                           
                                            @endforeach
                                        </select>

                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                {{-- <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter Phone" required>
                                    </div>
                                </div><!-- Col --> --}}
                                {{-- <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">R</label>
                                        <input type="text" class="form-control" placeholder="Enter state">
                                    </div>
                                </div><!-- Col --> --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select class="form-select" placeholder="Choose Type" name="Type" required>
                                            <option>{{$vehicle->type}}</option>
                                            <option value="truck">Truck</option>
                                            <option value="bike">Bike</option>
                                            <option value="car">Car</option>
                                            <option value="bus">Bus</option>


                                            
                                        </select>

                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row --> --}}
                            <button type="submit" class="btn btn-primary submit">Edit Vehicle</button>
                        </form>
                      
                </div>
            </div>
        </div>
    </div>
    




</div>

@endsection