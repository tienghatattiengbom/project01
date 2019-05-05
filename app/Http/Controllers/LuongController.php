<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_luong = new \App\Luong();
        $luongs = $model_luong->orderBy('id','desc')->get();

        return view('admin.luong.index', compact('luongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $model_ngay_cong = new \App\Ngaycong();
            $thang_tinh_luong = $model_ngay_cong->whereMonth('thang',$request->input('month'))->whereYear('thang',$request->input('year'))->first();
            if (!empty($thang_tinh_luong)) {
                \Session::flash('errors','Tháng đã tính lương');
                return view('admin.luong.create1');
            }else{
                $model_ngay_cong->thang = date('Y-m-d H:i:s',strtotime('1-'.$request->input('month').'-'.$request->input('year')));
                $model_ngay_cong->ngaycong = $request->input('ngay_cong');
                $model_ngay_cong->save();
                // tinh luong
                $model_luong = new \App\Luong();
                $luong_all = $model_luong->whereMonth('date', $request->input('month'))->whereYear('date',$request->input('year'))->get();
                foreach ($luong_all as $luong) {
                    $nhansu = \App\Nhansu::findOrFail($luong->nhansu_id);
                    $thuongs = \App\Thuong::where('status',1)->where('nhansu_id',$luong->nhansu_id)->get();
                    $tien_thuong = 0;
                    foreach ($thuongs as $thuong) {
                        $tien_thuong += $thuong->tien_thuong;
                        $thuong->status = 0;
                        $thuong->save();
                    }
                    $luong->luong = ($nhansu->salary_basic /  $model_ngay_cong->ngaycong) * $luong->ngay_cong + $tien_thuong;
                    $luong->save();
                }
                return redirect('/admin/luong');
            }
        }
        return view('admin.luong.create1');
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
        //
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
