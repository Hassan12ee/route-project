@extends('Admin.layouts.app')
@section('content')

<form method="POST" action="{{url("updateProduct/$view->id")}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$view->name}}">
      @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>


    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror text-white" id="exampleInputEmail1" aria-describedby="emailHelp" >{{$view->desc}}</textarea>
        @error('desc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror 
    </div>


      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$view->price}}">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$view->quantity}}">
        @error('quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


      <div class="form-group">
        <label for="exampleInputEmail1">old image</label>
        <img src="{{asset("storage/$view->photo")}}" width="100" alt="" srcset="">
        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        @error('photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection