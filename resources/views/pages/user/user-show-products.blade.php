@extends('layouts.index')
@section('content')
<div class="container">
    <h1>List User Page</h1>
    @if(session('notification'))
      <div class="alert alert-success">
          {{session('notification')}}
      </div>
    @endif
    <a type="button" class="btn btn-primary" href="{{ route('product.create') }}">Create Product</a>
    <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->image }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                  {{-- <a type="button" class="btn btn-primary" href="{{ route('user.edit', $user->id) }}" >Edit</a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form> --}}
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
