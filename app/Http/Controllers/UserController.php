<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request){
    	$model_user = new \App\User();
    	$users = $model_user->get();
    	return view('admin.user.index',[
    		'users' => $users
    		]);
    }


    public function show($id){
    	$user = \App\User::findOrFail($id);
    	return view('admin.user.view',[
    		'user' => $user
    		]);
    }

    public function create(Request $request){
        return view('admin.user.create');
    }

    public function update($id, Request $request){
        $user = \App\User::findOrFail($id);
        if ($request->isMethod('post')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
            $user->rule = $request->input('rule');
            $user->save();
            \Session::flash('success','Cập Nhật Thành Công');
             return redirect('/admin/user/');
        }
        return view('admin.user.update',[
            'user' => $user
            ]);
    }
}
