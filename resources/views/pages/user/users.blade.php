@extends('layouts.index')
@section('content')
<div class="container">
    <h1>List User Page</h1>
    @if(session('notification'))
      <div class="alert alert-success">
          {{session('notification')}}
      </div>
    @endif
    <a type="button" class="btn btn-primary" href="{{ route('product.create') }}">Create User</a>
    <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getAge($user->birthday) }}</td>
                <td>{{ $user->getGender($user->gender) }}</td>
                <td>
                  <a type="button" class="btn btn-primary" href="{{ route('user.edit', $user->id) }}" >Edit</a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
