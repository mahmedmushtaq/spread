<?php

namespace App\Http\Controllers;

use App\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    //
    public function index(){

        return view("admin.settings.setting",[
            'settings'=>WebSetting::all()
        ]);
    }
    public function update(Request $request,WebSetting $setting){

        $setting->site_name = $request->site_name;
        $setting->contact_number = $request->contact_number;
        $setting->contact_email = $request->contact_email;
        $setting->address = $request->address;
        $setting->save();
        session()->flash("success","Settings updated successfully");
        return redirect()->back();
    }
}
