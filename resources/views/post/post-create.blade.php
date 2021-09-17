@extends('layouts.app')
@section('content')
<div class="container">
  <div class="content-header">
    <h1 class="main-title">Create Product</h1>
    <div id="notification"></div>
  </div>
  <form name="create-user" method="post" action="{{ route('post.store') }}" >
    @csrf
    <div class="row mb-4">
      <div class="col-9">
        <div class="form-outline">
          <input type="text" id="form3Example1" class="form-control" name="title" placeholder="Full title"/>
          <label class="form-label" for="form3Example1">Title </label>
        </div>
      </div>
      <div class="col-3">
        <div class="form-outline">
          <label class="visually-hidden" >Author</label>
          <select class="select" name="user_id">
           
            @if (Auth::user()->role == 4)
             <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
            @else
              @foreach ($users as $user) 
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
    </div>
    <div class="form-outline mb-4">
      <input type="email" id="form3Example3" class="form-control" name="content" placeholder="Content"/>
      <label class="form-label" for="form3Example3">Content</label>
    </div>
    
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

    <!-- Register buttons -->
    <div class="text-center">
      <p>or sign up with:</p>
      <button type="button" class="btn btn-primary btn-floating mx-1">
        <i class="fab fa-facebook-f"></i>
      </button>

      <button type="button" class="btn btn-primary btn-floating mx-1">
        <i class="fab fa-google"></i>
      </button>

      <button type="button" class="btn btn-primary btn-floating mx-1">
        <i class="fab fa-twitter"></i>
      </button>

      <button type="button" class="btn btn-primary btn-floating mx-1">
        <i class="fab fa-github"></i>
      </button>
    </div>
  </form>
</div>
@endsection