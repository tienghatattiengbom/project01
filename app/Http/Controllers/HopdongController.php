<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HopdongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hopdong = \App\Hopdong::orderBy('id','desc')->get();
        return view('admin.hopdong.index',[
            'hopdongs' => $hopdong
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
            $this->validate($request,[
                    'nhansu_id' => 'required|unique:hopdongs',
                    'ma_hd' => 'required|unique:hopdongs',
                ],[
                    'nhansu_id.unique' => 'Mỗi nhân viên chỉ có 1 sổ bảo hiểm',
                    'ma_hd.unique' => 'Mã hợp đồng phải là duy nhất',
            ]);
            try {
                $model_hopdong = new \App\Hopdong();
                $model_hopdong->nhansu_id = $request->input('nhansu_id');
                $model_hopdong->ma_hd = $request->input('ma_hd');
                $model_hopdong->ten_hd = $request->input('ten_hd');
                $model_hopdong->ngay_ki = $request->input('ngay_ki');
                $model_hopdong->ngay_het_han = $request->input('ngay_het_han');
                $model_hopdong->status = $request->input('status');
                $model_hopdong->save();
            } catch (Exception $e) {
               echo "<pre>"; echo $e->getMessage(); die; 
           }
           return redirect('/admin/hopdong');
        }else{
            $model_nhansu = new \App\Nhansu();
            $nhanviens = $model_nhansu->pluck('name','id');
            return view('admin.hopdong.create',[
                'nhanvien' => $nhanviens
                ]);
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
            $this->validate($request,[
                    'nhansu_id' => 'required|unique:hopdongs,nhansu_id,'.$id,
                    'ma_hd' => 'required|unique:hopdongs,ma_hd,'.$id,
                ],[
                    'nhansu_id.unique' => 'Mỗi nhân viên chỉ có 1 hợp đồng',
                    'ma_hd.unique' => 'Mã hợp đồng phải là duy nhất',
            ]);
            try {
                $model_hopdong = \App\Hopdong::findOrFail($id);
                $model_hopdong->nhansu_id = $request->input('nhansu_id');
                $model_hopdong->ma_hd = $request->input('ma_hd');
                $model_hopdong->ten_hd = $request->input('ten_hd');
                $model_hopdong->ngay_ki = $request->input('ngay_ki');
                $model_hopdong->ngay_het_han = $request->input('ngay_het_han');
                $model_hopdong->status = $request->input('status');
                $model_hopdong->save();
            } catch (Exception $e) {
               echo "<pre>"; echo $e->getMessage(); die; 
           }
           return redirect('/admin/hopdong');
        }else{
            $model_nhansu = new \App\Nhansu();
            $nhanviens = $model_nhansu->pluck('name','id');
            $hopdong = \App\Hopdong::findOrFail($id);
            return view('admin.hopdong.update',[
                'nhanvien' => $nhanviens,
                'hopdong' => $hopdong
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
        \App\Hopdong::destroy($id);
        \Session::flash('success','Xóa thành công');
        return redirect(route('hopdongindex'));
    }
}
