<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongban = \App\PhongBan::get();
        return view('admin.phongban.index',[
            'phongbans' => $phongban
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $model_phongban = new \App\Phongban();
                $model_phongban->ten_phongban = $request->input('ten_phongban');
                $model_phongban->ma_phongban = $request->input('ma_phongban');
                $model_phongban->sdt_phongban = $request->input('sdt_phongban');
                $model_phongban->save();
            } catch (Exception $e) {
                 echo "<pre>"; echo $e->getMessage(); die; 
            }
            return redirect('/admin/phongban');

        }else{
            return view('admin.phongban.create');
        }
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
        $phongban = \App\PhongBan::findOrFail($id);
        return view('admin.phongban.view',[
            'phongban' => $phongban
        ]);
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
        if ($request->isMethod('post')) {
            try {
                $model_phongban = new \App\Phongban();
                $model_phongban->ten_phongban = $request->input('ten_phongban');
                $model_phongban->ma_phongban = $request->input('ma_phongban');
                $model_phongban->sdt_phongban = $request->input('sdt_phongban');
                $model_phongban->save();
            } catch (Exception $e) {
                 echo "<pre>"; echo $e->getMessage(); die; 
            }
            return redirect('/admin/phongban');

        }else{
            $phongban = \App\PhongBan::findOrFail($id);
            return view('admin.phongban.update',[
                'phongban' => $phongban
                ]);
        }
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
    }
}
