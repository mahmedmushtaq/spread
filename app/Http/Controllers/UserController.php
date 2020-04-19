<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;

use App\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware("admin")->only(['edit','create','store','show'
           ,'update','destroy','permissions','makeAdmin','approveAccount']);
      //  $this->middleware("auth")->except(['index']);
    }

    public function index()
    {
        //





        return view("admin.users.index",[
            'users'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.users.create");
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
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',

        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password123'),
        ]);



        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/1.jpg'
       ]);

        session()->flash("success","User created successfully");

        return redirect(route("users.index"));


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
    public function edit(User $user)
    {
        //


        return view("admin.users.create",[
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
      $data = $request->only(['name','email']);
      $user->update($data);
        session()->flash("success","User updated successfully");
      return redirect(route("users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        session()->flash("success","User deleted successfully");
        return redirect(route("users.index"));

    }

    public function permissions(User $user){
        return view("admin.users.permissions",[
            'user'=>$user
        ]);

    }

    public function makeAdmin(User $user){
        $user->update([
            'account'=>'approved',
            'admin'=>1
        ]);
        session()->flash("success","You have created a new admin");

        return redirect(route('users.index'));
    }

    public function approveAccount($id){

        $user = User::find($id);
        $user->account = "approved";
        $user->save();
        session()->flash("success","Account approved successfully");
        return redirect(route("users.index"));
    }


}
