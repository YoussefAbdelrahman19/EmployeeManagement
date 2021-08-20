@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    </div>

{{-- Custom  --}}
<div class="row ">
<div class="card mx-auto">
    {{-- this is the session  from Insert--}}
<div >
@if(Session::has('message'))
<div class="alert alert-success">
    {{Session::get('message')}}
</div>
@endif

</div>
{{-- Session from Update  --}}
<div>
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
</div>
{{-- Session of destroy --}}
<div>
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    </div>
    {{-- delete succes session --}}
    <div>
        @if(Session::has('message2'))
        <div class="alert alert-success">{{Session::get('message2')}}</div>
        @endif
        </div>
    {{-- this is the end of session it will fired when data came from store and redirected to here  --}}
<div class="card-header">

 {{--  the search  --}}

 <form action="{{route('users.index')}}" method="get"
 class="d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search my-4 border border-2">
 <div class="input-group">
     <input type="search" class="form-control bg-light border-0 small" placeholder="Search for..."
         aria-label="Search" aria-describedby="basic-addon2" name="search">
     <div class="input-group-append">
         <button class="btn btn-primary" type="submit">
             <i class="fas fa-search fa-sm"></i>
         </button>
     </div>
 </div>
</form>
<a href="{{route('users.create')}}" class="float-right btn btn-primary">Create New User</a>

</div>
 {{-- End of the search --}}


<div class="card-body">
                    {{-- next is all users in a table  --}}

<table class="table table-bordered table-hover p-2 mx-1">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($users as $user )
    <tr>

      <th scope="row">{{$user->id}}</th>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>
          <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit </a>
      </td>

    </tr>
     @endforeach



  </tbody>
</table>

 {{-- End of all users  --}}
 <div>

</div>
</div>



@endsection
