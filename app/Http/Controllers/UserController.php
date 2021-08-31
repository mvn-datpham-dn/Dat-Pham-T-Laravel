<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user.users', ['users' => $users ])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $products = Product::where('user_id', $id)->get();
        return view('pages.user.user-show-products', ['products' => $products])->render();;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.user-update', ['user' => $user])->render();
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
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'birthday' => 'required',
            ],
            [
                'name.required' => 'No Name',
                'email.required' => 'No Email',
                'birthday.required' => 'No Birthday',
            ]
        );
        $user = $request->all();
        $check = User::find($id)->update($user);
        if($user){
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
        $check = User::find($id)->delete();
        if($check){
            return back()->with('notification', 'Delete user success');
        }else  return back()->with('notification', 'Delete user error');
       
    }
}
