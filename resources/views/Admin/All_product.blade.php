@extends('Admin.layouts.app')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __("msg.Our Products") }}</h4>
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> {{ __("msg.Photo") }} </th>
                <th> {{ __("msg.Name") }} </th>
                <th> {{ __("msg.price") }} </th>
                <th> {{ __("msg.quantity") }} </th>
                <th> {{ __("msg.desc") }} </th>
                <th> {{ __("msg.action") }} </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($view as $views)
                <tr>
                    <td> {{ $views->id }} </td>
                    <td class="py-1">
                      <img src="{{ asset("storage/$views->photo")}}" width="35px" height="35px" alt="image" />
                    </td>
                    <td> {{ $views->name }} </td>
                    <td>{{ $views->price }}pound</td>
                    <td> {{ $views->quantity }} </td>
                    <td>{{ $views->desc }}</td>
                    <td>  
                      <form action="{{url("deleteProduct/$views->id")}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">delete</button>
                      </form>
                      <h1>
                          <a class="btn btn-success" href="{{url("editProduct/$views->id")}}" >edit</a>
                      </h1>
                  
          </td>
                  </tr>
                @endforeach
             
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection