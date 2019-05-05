<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasController extends Controller
{
    public function index(){
        if (\Auth::user()->rule == 2) {
            $nhanvien = \App\Nhansu::findOrFail(\Auth::user()->nhansu_id);
            return view('admin.das.cus',[
                'nhansu' => $nhanvien,
            ]);
        }else{
            $nhansu = \App\Nhansu::count();
            $thuong = 0;
            $thuong_all = \App\Thuong::get();
            foreach ($thuong_all as $thuong_sig) {
                $thuong += $thuong_sig->tien_thuong;
            }
            return view('admin.das.index',[
                'nhansu' => $nhansu,
                'thuong' => $thuong
            ]);
        }
    	
    }
    public function reset(){
        \App\Thuong::truncate();
        \App\Ngaycong::truncate();
        \App\Luong::truncate();
        \App\Chamcong::truncate();
       return redirect(route('admin'));
    }
}
