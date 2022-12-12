@extends('layouts.master-admin')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vehicles Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Users</h6>
    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Plate Number</th>
            <th>Vehicle Owner</th>
            <th>Type</th>
            <th>Action</th>
          
          </tr>
          
        </thead>
        <tbody>
          
          @foreach($newVehicle as $vehicle)
          <tr>
            <td>{{$vehicle['plateNumber']}}</td>
            <td>{{$vehicle['owner']}}</td>
            <td>{{$vehicle['type']}}</td>
           
            <td><a href="{{URL::to($userURL.'/vehicles/edit/'.$vehicle['id'])}}" class="btn btn-primary btn-icon">
                <i data-feather="edit"></i>
            </a>
            {{-- <a href="{{URL::to($userURL.'/vehicles/delete/'.$vehicle['id'])}}" class="btn btn-danger btn-icon">
                <i data-feather="trash"></i>
            </a>--}}</td>
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>

@endsection