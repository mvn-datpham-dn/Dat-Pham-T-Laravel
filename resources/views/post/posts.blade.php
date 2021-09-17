@extends('layouts.app')
@section('content')
<div class="main-body">

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
      <li class="breadcrumb-item active" aria-current="page">User List</li>
    </ol>
    <a href="{{ route('post.create') }}" class="btn btn-"type="button" class="btn btn-info">New User</a>
  </nav>
  <div id="notification"></div>
  <!-- /Breadcrumb -->
  <table id="post-table" class="table table-striped table-bordered user-table" style="width:100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="user-list">
      <input type="hidden" name="" id=""   {{ $stt = 1 }}>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $stt++ }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td>
          <a href="{{ route('post.edit', $post->id) }}">
            <i class="fas fa-user-edit"></i>
          </a>
          <form action="{{ route('post.destroy', $post->id) }}" method="post" enctype="multipart/form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-">
              <i class="far fa-trash-alt"></i>
            </a>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>
<script src="{{ asset('js/post/posts.js') }}">

</script>
@endsection