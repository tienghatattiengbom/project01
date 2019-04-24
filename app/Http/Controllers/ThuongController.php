<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_thuong = new \App\Thuong();
        $thuong = $model_thuong->get();
        return view('admin.thuong.index',[
            'thuongs' => $thuong
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!empty($request->input('name'))) {
            $name = $request->input('name');
            $model_nhansu = new \App\Nhansu();
            $nhanvien = $model_nhansu->where("name",$name)->first();
            return view('admin.thuong.create2',[
                'nhanvien' => $nhanvien
                ]);
        }
        return view('admin.thuong.create1');
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
        $thuong = \App\Thuong::findOrFail($id);
        return view('admin.thuong.view',['thuong' => $thuong]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        echo "<pre>"; print_r($id);die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhansu = \App\Thuong::destroy($id);
        \Session::flash('success','Xóa thành công');
        return redirect(route('thuongindex'));
    }

    public function keeping(Request $request){
        $model_thuong = new \App\Thuong();
        try {
            $model_thuong->nhansu_id = $request->input('nhansu_id');
            $model_thuong->tien_thuong = implode('', explode(',', $request->input('tien_thuong')));
            $model_thuong->date = date('Y-m-d', strtotime($request->input('date')));
            $model_thuong->note = $request->input('note');
            $model_thuong->status = 1;
            // echo "<pre>"; print_r($model_thuong);die;
            \Session::flash('success','Thêm thưởng thành công');
            $model_thuong->save();
        } catch (Exception $e) {
            echo "<pre>"; echo $e->getMessage(); die;  // insert query
        }
        return redirect('/admin/thuong');
    }
}
