@extends('layouts.index')
@section('content')
<div class="container">
    <h1>List User Page</h1>
    <a type="button" class="btn btn-primary" href="{{ route('product.create') }}">Create Product</a>
    <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
