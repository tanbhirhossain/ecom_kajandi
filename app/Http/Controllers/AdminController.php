<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\role_admin;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function add_user(){
        return view('backend.user.add_user');
    }

    public function save_user(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:admins,email',
            'user_role' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->user_role = $request->user_role;
        $admin->save();


        $admin_id = $admin->id;
        Session::put('id',$admin_id);

        $ar = new role_admin();
        $ar->admin_id = $admin_id;
        $ar->role_id = $request->user_role;
        $ar->save();

        return back()->with('message_success','User Added Successfully.....');
    }

    public function user_list(){
        $all_user = Admin::all();
        return view('backend.user.user_list',compact('all_user'));
    }





}
