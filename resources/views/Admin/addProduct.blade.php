@extends('Admin.layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ __("msg.Add Product") }}</h4>
        <p class="card-description">  </p>
        <form class="forms-sample" action="{{ route("storeproduct") }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="Name">{{ __("msg.name") }}</label>
            <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
          <div class="form-group">
            <label for="price">{{ __("msg.price") }}</label>
            <input type="text"  name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
          <div class="form-group">
            <label for="quantity">{{ __("msg.quantity") }}</label>
            <input type="number"  name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="quantity">
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
          <div class="form-group">
            <label for="photo">{{ __("msg.Photo") }}</label>
              <input type="file" name="photo" accept="image/*" class="form-control file-upload-info @error('photo') is-invalid @enderror"  placeholder="">           
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
          <div class="form-group">
            <label for="desc">{{ __("msg.desc") }}</label>
            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="10"></textarea>
          </div>
          @error('desc')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
          <button type="submit" class="btn btn-primary me-2">{{ __("msg.Submit") }}</button>
          
        </form>
      </div>
    </div>
  </div>
  @if (Session::has('success'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
  </div>
@endif
  @endsection