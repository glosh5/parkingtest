@extends('layouts.master-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>

   
  
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add User</h6>
                        <form method="POST" action="{{URL::to($userURL.'/users/update/'.$user->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="fname" class="form-control" value="{{$user->fname}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text"  name="lname" class="form-control" value="{{$user->lname}}" >
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" value="{{$user->phone}}" >
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tag id</label>
                                        <input type="text" class="form-control" value="{{$user->tag_id}}" name="tag_id">
                                    </div>
                                </div>
                                
                                <!-- Col -->
                                {{-- <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">R</label>
                                        <input type="text" class="form-control" placeholder="Enter state">
                                    </div>
                                </div><!-- Col --> --}}
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select class="form-select" placeholder="Choose Type" name="type" required>
                                            <option>{{$user->type}}</option>
                                            <option value="gatePerson">gatePerson</option>
                                            <option value="VehicleOwner">VehicleOwner</option>
                                            
                                        </select>

                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password2" class="form-control" autocomplete="off" value="{{$user->password}}" hidden>
                                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter the password">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-primary submit">Eddit User</button>
                        </form>
                      
                </div>
            </div>
        </div>
    </div>
    




</div>
@endsection