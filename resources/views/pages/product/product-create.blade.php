@extends('layouts.index')
@section('content')
<div class="container">
    <h1>Create Product</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br>
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          <small id="emailHelp" class="form-text text-muted">Full Name</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Price</label>
          <input type="text" class="form-control" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="text" class="form-control" name="image" placeholder="Image">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="Quantity">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection