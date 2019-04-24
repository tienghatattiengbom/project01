<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamcongController extends Controller
{
    public function index(){
    	$model_chamcong = new \App\Chamcong();
        $chamcong = $model_chamcong->get();
    	return view('admin.chamcong.index',[
    		'chamcongs' => $chamcong
    	]);
    }

    public function create(Request $request){
    	if (!empty($request->input('name'))) {
    		$name = $request->input('name');
    		$model_nhansu = new \App\Nhansu();
        	$nhanvien = $model_nhansu->where("name",$name)->first();
    		return view('admin.chamcong.create2',[
    			'nhanvien' => $nhanvien
    			]);
    	}
    	return view('admin.chamcong.create1');
    }

    public function keeping(Request $request){
    	// echo "<pre>"; print_r();die;
    	$model_chamcong = new \App\Chamcong();
    	// if ($model_chamcong->where('nhansu_id',$request->input('nhansu_id'))->get()) {
    	// 	# code...
    	// }
    	try {
	    	$model_chamcong->nhansu_id = $request->input('nhansu_id');
	    	$model_chamcong->start_time = date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('start_time')));
	    	$model_chamcong->end_time = !empty($request->input('end_time')) ?  date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('end_time'))) : null;
	    	$model_chamcong->note = $request->input('note');
	    	// echo "<pre>"; print_r($model_chamcong);die;
	    	
	    	$model_chamcong->save();

            // them ngay cong vao table luong
            $model_luong = new \App\Luong();
            $month = date('m',strtotime($request->input('date')));
            $luong = $model_luong->where('nhansu_id',$request->input('nhansu_id'))->whereMonth("date", $month)->first();
            if (!empty($luong)) {
                $luong->ngay_cong++;
                $luong->save();
            }else{
                $model_luong->nhansu_id = $request->input('nhansu_id');
                $model_luong->date = date('Y-m-d',strtotime($request->input('date')));
                $model_luong->ngay_cong = 1;
                $model_luong->save();
            }
            \Session::flash('success','Ghi danh thành công');
    	} catch (Exception $e) {
    		echo "<pre>"; echo $e->getMessage(); die;  // insert query
    	}
    	return redirect('/admin/chamcong');
    }

    public function autocomplete(Request $request){
    	$model_nhansu = new \App\Nhansu();

        $data = $model_nhansu::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();
   
        return response()->json($data);
    }

    public function destroy($id){
        $nhansu = \App\Chamcong::destroy($id);
        \Session::flash('success','Xóa thành công');
        return redirect(route('chamcongindex'));
    }
}
