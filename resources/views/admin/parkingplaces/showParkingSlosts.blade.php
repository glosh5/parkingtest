@extends('layouts.master-admin')
@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Parking Slot Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">{{$parkingLocation->name}} Slots </h6>
    {{-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>code/Name</th>
            <th> Category</th>
            <th> Status</th>
            <th>Action</th>
         
          
          </tr>
          
        </thead>
        <tbody>
            @foreach($parkings as $parking)

          <tr>
            <td>{{$parking->code}}</td>
            <td>{{$parking->category}}</td>
            <td>{{$parking->status}}</td>
          
            <td><a type="button" class="btn btn-primary btn-icon" href="{{URL::to($userURL.'/parking/slots/edit/'.$parking->id)}}">
                <i data-feather="edit"></i>
            </a>
            <a type="button" class="btn btn-danger btn-icon" href="{{URL::to($userURL.'/parking/slots/delete/'.$parking->id)}}">
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