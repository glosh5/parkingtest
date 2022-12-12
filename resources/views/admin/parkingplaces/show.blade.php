@extends('layouts.master-admin')
@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Parking Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Parking</h6>
    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Parking slots</th>
            <th>Price per hour</th>
            <th>Action</th>
            
          </tr>
          
        </thead>
        <tbody>
           @foreach($parkings as $parking)

          <tr>
            <td>{{$parking['name']}}</td>
            <td>{{$parking['Available_spot']}}</td>
            <td>{{$parking['Price_per_hourly']}}</td>
           
            <td>
              @if($parking['parking_slots'] > 0)
              <a type="button" href="{{URL::to($userURL.'/parking/slots/show/'.$parking['id'])}}" class="btn btn-primary btn-icon">
                <i data-feather="eye"></i>
              </a>
              @endif
              @if($parking['parking_slots'] == 0)
              <a type="button" href="{{URL::to($userURL.'/parking/slots/'.$parking['id'])}}" class="btn btn-success btn-icon">
                <i data-feather="plus"></i>
              </a>
              @endif
             
              
              <a type="button" class="btn btn-primary btn-icon" href="{{URL::to($userURL.'/parking/edit/'.$parking['id'])}}">
                <i data-feather="edit"></i>
              </a>
            <a href="{{URL::to($userURL.'/parking/delete/'.$parking['id'])}}" class="btn btn-danger btn-icon">
                <i data-feather="trash"></i>
            </a></td>
           
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