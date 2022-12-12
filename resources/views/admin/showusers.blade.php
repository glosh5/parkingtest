@extends('layouts.master-admin')
@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users Details</li>
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Action</th>
          
          </tr>
          
        </thead>
        <tbody>
            @foreach($users as $user)

          <tr>
            <td>{{$user->fname}}</td>
            <td>{{$user->lname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->type}}</td>
            <td><a href="{{URL::to($userURL.'/users/edit/'.$user->id)}}" class="btn btn-primary btn-icon">
                <i data-feather="edit"></i>
            </a>
            <a type="button" class="btn btn-danger btn-icon" href="{{URL::to($userURL.'/users/delete/'.$user->id)}}">
                <i data-feather="trash"></i>
            </a>
            <a type="button" class="btn btn-danger btn-icon" href="{{URL::to($userURL.'/users/message/'.$user->id)}}">
              <i data-feather="send"></i>
          </a>
          </td>
           
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