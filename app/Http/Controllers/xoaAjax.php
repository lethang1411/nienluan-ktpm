<?php

namespace App\Http\Controllers;

use Request;
use App\anhdv;
use File;
use Response;
use DB;

class xoaAjax extends Controller
{
    //Xóa ảnh hiện tại
    public function xoaAnhDV($id){
    	if(Request::ajax()){
    		//Lấy id ảnh
    		$id = (int)Request::get('idHinh');
    		$ten = anhdv::find($id);
    		if(!empty($ten)){
    			//Lấy tấm ảnh ra trong thu mục
    			$img = 'public/dichvu/'.$ten->tenanh;
    			//Xóa file ảnh trong thư mục
    			if(File::exists($img)){
    				File::delete($img);
    			}
    			//Xóa ảnh trong csdl
    			$ten->delete();
    		}
    		return Response::json(['success'=>true]);
    	}
    }

    //Xóa dịch vụ
    public function xoaDV(){
        if(Request::ajax()){
            //Lấy mã dịch vụ
            $madv = Request::get('madv');
            
            //Xóa ảnh phụ trong bảng anh_dv
            $anh_list = DB::table('anh_dv')->where('madv',$madv)->get();
            if(!empty($anh_list)){
                foreach ($anh_list as $key => $val) {
                    //Xóa ảnh phụ trong thư mục
                    $duongdan = 'public/dichvu/'.$val->tenanh;
                    if(File::exists($duongdan)){
                        File::delete($duongdan);
                    }
                    //Xóa ảnh phụ trong bảng ảnh dv
                    DB::table('anh_dv')->where('id',$val->id)->delete();
                }
            }

            //Xóa ảnh chính trong thư mục
            $anhchinh = DB::table('dich_vu')->where('madv',$madv)->first();
            $duongdan = 'public/dichvu/'.$anhchinh->anhdv;
            if(File::exists($duongdan)){
                File::delete($duongdan);
            }

            //Xóa dịch vụ trong bảng dịch vụ
            DB::table('dich_vu')->where('madv',$madv)->delete();

        return Response::json(['success'=>true]);
        }
    }

    //Xóa khuyến mãi
    public function xoaKM(Request $request){
        if(Request::ajax()){
            $makm = Request::get('makm');

            //Xóa khuyến mãi trong bảng khuyến mãi
            DB::table('khuyen_mai')->where('makm',$makm)->delete();
            //Xóa khuyến mãi trong bảng chi tiết khuyến mãi
            DB::table('chi_tiet_km')->where('makm',$makm)->delete();

            return Response::json(['success'=>true]);
        }
    }
}