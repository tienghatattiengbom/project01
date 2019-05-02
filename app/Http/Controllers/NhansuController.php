<?php

namespace App\Http\Controllers;

use App\Nhansu;
use Validator;
use Illuminate\Http\Request;

class NhansuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_nhansu = new Nhansu();
        $nhansus = $model_nhansu->get();
        // return $view->render();
        return view('admin.nhansu.index', compact('nhansus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            try{
                $model_nhansu = new Nhansu();
                $model_nhansu->name = $request->input('name');
                $model_nhansu->addrees = $request->input('addrees');

                $model_nhansu->phone = implode('',explode('-',$request->input('phone')));

                $model_nhansu->email = $request->input('email');
                $model_nhansu->birthday = date('Y-m-d H:i:s', strtotime($request->input('birthday')));
                $model_nhansu->sex = $request->input('sex');
                $model_nhansu->salary_basic = implode('', explode(',', $request->input('salary_basic')));
                $model_nhansu->start_date = date('Y-m-d',strtotime($request->input('start_date')));

                $model_nhansu->save();
                \Session::flash('success','Tạo mới thành công');
            }
            catch(\Exception $e){
               echo "<pre>"; echo $e->getMessage(); die;  // insert query
            }   
            return redirect('/admin/nhansu');
        }
        return view('admin.nhansu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required|unique:nhansus|max:13',
            'email' => 'required|unique:nhansus|max:255',
        ],[
            'phone.unique' => 'Số điện thoại phải là duy nhất',
            'email.unique' => 'Email phải là duy nhất',
        ]);
        return $this->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nhansu  $nhansu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $nhansu = Nhansu::findOrFail($id);
        return view('admin.nhansu.view',['nhansu' => $nhansu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nhansu  $nhansu
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhansu $nhansu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nhansu  $nhansu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nhansu = Nhansu::findOrFail($id);
        if ($request->isMethod('post')) {
             $this->validate($request,[
                'phone' => 'required|unique:nhansus,phone,'.$id,
                'email' => 'required|email|unique:nhansus,email,'.$id,
            ],[
                'phone.unique' => 'Số điện thoại phải là duy nhất',
                'email.unique' => 'Email phải là duy nhất',
            ]);

            try {
                $nhansu->name = $request->input('name');
                $nhansu->addrees = $request->input('addrees');

                $nhansu->phone = $request->input('phone');

                $nhansu->email = $request->input('email');
                $nhansu->birthday = date('Y-m-d H:i:s', strtotime($request->input('birthday')));
                $nhansu->sex = $request->input('sex');
                $nhansu->save();
                \Session::flash('success','Update thành công');
            } catch (Exception $e) {
                 echo "<pre>"; echo $e->getMessage(); die;  // insert query
            }
            return redirect('/admin/nhansu');
            
        }
        return view('admin.nhansu.update',['nhansu' => $nhansu]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nhansu  $nhansu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $nhansu = Nhansu::destroy($id);
        \Session::flash('success','Xóa thành công');
        return redirect(route('nhansuindex'));
    }
}
