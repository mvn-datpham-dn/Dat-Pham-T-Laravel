@extends('layouts.index')
@section('content')
<div class="container">
    <h1>User Update</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br>
            @endforeach
        </div>
    @endif
    @if(session('notification'))
        <div class="alert alert-success">
            {{session('notification')}}
        </div>
    @endif
    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $user->name }}">
          <small id="emailHelp" class="form-text text-muted">Full Name</small>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday" value="{{ $user->birthday }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="gender"
                    @if ($user->gender == 1 )checked @endif
                    >Nam  
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="2" name="gender" 
                    @if ($user->gender == 2 )checked @endif
                    >Nữ
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-secondary" href="{{ route('user.index') }}" >Back</a>
      </form>
</div>
@endsection