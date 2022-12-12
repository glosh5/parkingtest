@extends('layouts.master-admin')
@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Parked Vehicles Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Parked Vehicles Details</h6>
    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Vehicle Name</th>
            <th>Owner</th>
            <th>Spot</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Fees</th>
            <th>Status</th>
          
            <th>RecordedBy</th>
          
            <th>Action</th>
            

          </tr>
          
        </thead>
        <tbody>
           @foreach($parkedVehicle as $parking)

          <tr>
            <td>{{$parking['name']}}</td>
            <td>{{$parking['owner']}}</td>
            <td>{{$parking['spot']}}</td>
            <td>{{$parking['checkin']}}</td>
            <td>{{$parking['checkout']}}</td>
            <td>{{$parking['fees']}}</td>
            <td>{{$parking['status']}}</td>
            <td>{{$parking['recordedBy']}}</td>
            <td>
              <a type="button" class="btn btn-primary btn-icon" href="{{URL::to($userURL.'/parkedCar/checkout/'.$parking['id'].'/'.$parking['vehicleId'])}}">
                <i data-feather="edit"></i>
              </a>
            <button type="button" class="btn btn-danger btn-icon">
                <i data-feather="trash"></i>
            </button></td>
           
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