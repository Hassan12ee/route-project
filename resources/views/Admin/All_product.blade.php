@extends('Admin.layouts.app')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Our Products</h4>
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> photo </th>
                <th> name </th>
                <th> price </th>
                <th> Amount </th>
                <th> desc </th>
                <th> action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($view as $views)
                <tr>
                    <td> {{ $views->id }} </td>
                    <td class="py-1">
                      <img src="{{ asset('Product/'. $views->photo) }}" width="35px" height="35px" alt="image" />
                    </td>
                    <td> {{ $views->name }} </td>
                    <td>{{ $views->price }}pound</td>
                    <td> {{ $views->quantity }} </td>
                    <td>{{ $views->desc }}</td>
                    <td>non </td>
                  </tr>
                @endforeach
             
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection