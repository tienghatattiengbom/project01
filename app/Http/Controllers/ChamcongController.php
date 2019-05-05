<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamcongController extends Controller
{
    public function index(){
        $model_chamcong = new \App\Chamcong();
        $q = $model_chamcong->orderBy('id','desc');
        $conditions = [];
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $name = $_GET['name'];
            $q = $q->whereHas('nhansus',function($query) use ($name){$query->where('name', 'like', "%$name%");});
        }
        if (isset($_GET['date']) && !empty($_GET['date'])) {
            $date = $_GET['date'];
            $q = $q->whereDate('start_time',"$date");
        }
    	
        $chamcong = $q->get();
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

    public function update(Request $request, $id){
        if (!empty($request->all())) {
            $model_chamcong = \App\Chamcong::findOrFail($id);
            $model_chamcong->start_time = date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('start_time')));
            $model_chamcong->end_time = !empty($request->input('end_time')) ?  date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('end_time'))) : null;
            $model_chamcong->note = $request->input('note');
            $model_chamcong->save();
            \Session::flash('success','Đã sửa chấm công');
            return redirect('/admin/chamcong/index');
        }
        $chamcong = \App\Chamcong::findOrFail($id);
        return view('admin.chamcong.update',[
            'chamcong' => $chamcong
            ]);
    }

    public function checkin(){
        try {
            $model_chamcong_check = new \App\Chamcong();
            $chamcong_check = $model_chamcong_check->whereDate('date',date('Y-m-d',strtotime('now')))->where('nhansu_id',\Auth::user()->nhansu_id)->first();
            if (!empty($chamcong_check)) {
                \Session::flash('errors','Hôm nay đã chấm công');
                return redirect('/admin/');
            }else{
                $model_chamcong = new \App\Chamcong();
                $model_chamcong->nhansu_id = \Auth::user()->nhansu_id;
                $model_chamcong->date = date('Y-m-d',strtotime('now'));
                $model_chamcong->start_time = date('Y-m-d H:i:s',strtotime('now'));
                $model_chamcong->save();

                \Session::flash('success','Ghi danh thành công');
                return redirect('/admin/');
            }
            
        } catch (Exception $e) {
            echo "<pre>"; echo $e->getMessage(); die;  // insert query
        }
        return redirect('/admin/');
    }

    public function checkout(){
        try {
            $model_chamcong = new \App\Chamcong();
            $chamcong = $model_chamcong->whereDate('date',date('Y-m-d',strtotime('now')))->where('nhansu_id',\Auth::user()->nhansu_id)->first();
            if (!empty($chamcong->end_time)) {
                \Session::flash('errors','Hôm nay đã chấm công');
                return redirect('/admin/');
            }else{
                $chamcong->end_time = date('Y-m-d H:i:s',strtotime('now'));
                $chamcong->save();
                \Session::flash('success','Checkout thành công');

                // them ngay cong vao table luong
                $model_luong = new \App\Luong();
                $month = date('m',strtotime('now'));
                $luong = $model_luong->where('nhansu_id',\Auth::user()->nhansu_id)->whereMonth("date", $month)->first();
                if (!empty($luong)) {
                    $luong->ngay_cong++;
                    $luong->save();
                }else{
                    $model_luong->nhansu_id = $chamcong->nhansu_id;
                    $model_luong->date = date('Y-m-d',strtotime('now'));
                    $model_luong->ngay_cong = 1;
                    $model_luong->save();
                }

                return redirect('/admin/');
            }
        } catch (Exception $e) {
            echo "<pre>"; echo $e->getMessage(); die;  // insert query
        }
        return redirect('/admin/');
    }

    public function keeping(Request $request){
    	// echo "<pre>"; print_r();die;
    	$model_chamcong = new \App\Chamcong();
    	// if ($model_chamcong->where('nhansu_id',$request->input('nhansu_id'))->get()) {
    	// 	# code...
    	// }
    	try {
	    	$model_chamcong->nhansu_id = $request->input('nhansu_id');
            $model_chamcong->date = date('Y-m-d H:i:s',strtotime($request->input('date')));
	    	$model_chamcong->start_time = date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('start_time')));
	    	$model_chamcong->end_time = !empty($request->input('end_time')) ?  date('Y-m-d H:i:s',strtotime($request->input('date')." ".$request->input('end_time'))) : null;
	    	$model_chamcong->note = $request->input('note');
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
