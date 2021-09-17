@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ route('post.update', $post->id) }}"  method="POST" >
    @csrf
    @method('PATCH')
    <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Title</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Content</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" name="content" value="{{ $post->content }}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Author</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <select class="select" name="user_id">
              @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? ' selected' : '' }}>{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9 text-secondary">
            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
          </div>
        </div>
    </form>
    <form action="{{ route('post.destroy', $post->id) }}" method="post">
      @csrf
      @method('DELETE')
      <button >Delete</button>
    </form>
</div>
@endsection