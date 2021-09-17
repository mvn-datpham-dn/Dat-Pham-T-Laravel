<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
      $user = Auth::user();
      if ($user->can('viewAny', Post::class)) {
        $posts = Post::all();
        return view('post.posts', ['posts'=>$posts]);
      }
      return view('errors.403');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      $user = Auth::user();
      if ($user->can('create', Post::class)) {
        $users = User::all();
        return view('post.post-create', ['users' => $users]);
      }else return view('errors.403');
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
      $user = Auth::user();
      $users = User::all();
      $post = Post::find($id);
      if ($user->can('update', $post)) {
        return view('post.post-edit', ['post' => $post, 'users' => $users]);
      }
      return view('errors.403');
      
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
      $user = Auth::user();
      $post = Post::find($id);
      if ($user->can('update', $post)) {
        $check = Post::find($id)->update($request->all());
        return back();
      }
     return view('errors.403');
    }
    public function destroy($id)
    {   
      $user = Auth::user();
      if ($user->can) {
        $post = Post::find($id)->delete();
        return "Deleted User";
      }
      return view('errors.403');  
    }
}
