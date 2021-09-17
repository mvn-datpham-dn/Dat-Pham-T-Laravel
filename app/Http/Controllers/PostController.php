<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      if (Gate::allows('post-list')) {
        $posts = Post::all();
        return view('post.posts', ['posts'=>$posts]);
      }else{
        return view('errors.403');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      $this->authorize('post-create');
      $users = User::all();
      return view('post.post-create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = $request->all();
      $check = Post::create($user);
      if($check){
        return back()->with('notification', 'Success');
      }else return back()->with('notification', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
      $users = User::all();
      $post = Post::find($id);
      return view('post.post-edit', ['post' => $post, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
      $user = $request->all();
      $check = Post::find($id)->update($user);
      if($check){
        return redirect()->back()->with('notification', 'Update user success');
      }else  return redirect()->back()->with('notification', 'Update user error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
      return "ok";
        $post = Post::find($id)->delete();
        return redirect()->back()->with('notification', 'Remove user');
    }
}
