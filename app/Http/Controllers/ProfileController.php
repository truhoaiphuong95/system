<?php

namespace App\Http\Controllers;
use Redirect;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Staff;

class ProfileController extends Controller
{
    public function getEdit() {
        return view('profile-edit');
    }
    
    public function postEdit(Request $request) {
        $data = staff::find(UserInfo()->id);
        if (strlen($request->inputMatkhau) > 0) {
            if ($request->inputMatkhau == $request->inputReMatkhau) {
                $data->matkhau =Hash::make($request->inputMatkhau);
            } else {
                return Redirect::back()->withErrors(['Mật khẩu nhập lại không đúng!']);
            }
        } 
        $data->sdt = $request->inputSdt;
        $data->ten = $request->inputTen;
        $data->ngaysinh = $request->inputNgaysinh;
        $data->save();
        
        return redirect()->route('staff.profile.edit.get');
    }
}
