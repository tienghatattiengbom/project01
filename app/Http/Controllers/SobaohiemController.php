<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobaohiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sobaohiem = \App\Sobaohiem::get();
        return view('admin.sobaohiem.index',[
            'sobaohiems' => $sobaohiem
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
                $model_sobaohiem = new \App\Sobaohiem();
                $model_sobaohiem->nhansu_id = $request->input('nhansu_id');
                $model_sobaohiem->ma_sbh = $request->input('ma_sbh');
                $model_sobaohiem->ngay_cap = $request->input('ngay_cap');
                $model_sobaohiem->noi_cap = $request->input('noi_cap');
                $model_sobaohiem->note = $request->input('note');
                $model_sobaohiem->save();
            } catch (Exception $e) {
               echo "<pre>"; echo $e->getMessage(); die; 
           }
           return redirect('/admin/sobaohiem');
        }else{
            $nhanviens = \App\Nhansu::get();
            foreach ($nhanviens as $value) {
                $nhanvien[$value->id] = $value->name;
            }
            return view('admin.sobaohiem.create',[
                'nhanvien' => $nhanvien
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
        $this->validate($request,[
            'nhansu_id' => 'required|unique:sobaohiems',
            'ma_sbh' => 'required|unique:sobaohiems',
            ],[
            'nhansu_id.unique' => 'Mỗi nhân viên chỉ có 1 sổ bảo hiểm',
            'ma_sbh.unique' => 'Mã bảo hiểm phải là duy nhất',
            ]);
        return $this->create($request);
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
            'nhansu_id' => 'required|unique:sobaohiems,nhansu_id,'.$id,
            'ma_sbh' => 'required|unique:sobaohiems,ma_sbh,'.$id,

            ],[
            'nhansu_id.unique' => 'Mỗi nhân viên chỉ có 1 sổ bảo hiểm',
            'ma_sbh.unique' => 'Mã bảo hiểm phải là duy nhất',
            ]);
            try {
                $model_sobaohiem = \App\Sobaohiem::findOrFail($id);
                $model_sobaohiem->nhansu_id = $request->input('nhansu_id');
                $model_sobaohiem->ma_sbh = $request->input('ma_sbh');
                $model_sobaohiem->ngay_cap = $request->input('ngay_cap');
                $model_sobaohiem->noi_cap = $request->input('noi_cap');
                $model_sobaohiem->note = $request->input('note');
                $model_sobaohiem->save();
            } catch (Exception $e) {
                 echo "<pre>"; echo $e->getMessage(); die; 
            }
            return redirect('/admin/sobaohiem');

        }else{
            $sobaohiem = \App\Sobaohiem::findOrFail($id);
            $model_nhansu = new \App\Nhansu();
            $nhanviens = $model_nhansu->pluck('name','id');
            return view('admin.sobaohiem.update',[
                'nhanvien' => $nhanviens,
                'sobaohiem' => $sobaohiem
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
        $nhansu = \App\Sobaohiem::destroy($id);
        \Session::flash('success','Xóa thành công');
        return redirect(route('sobaohiemindex'));
    }
}
