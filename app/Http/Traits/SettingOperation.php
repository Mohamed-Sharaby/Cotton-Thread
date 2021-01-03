<?php

namespace App\Http\Traits;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

trait SettingOperation
{


    /**
     * Update Existing Setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function RegisterSetting(Request $request){
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
//            Validator::make($data,[
//                $key.'.*'=>'required|string',
//            ])->validate();
            if($key == '_token' || !$value) continue;
            {
                if ($request->file($key))
                {
                    $path = \Storage::disk('public')->putFile(uploadpath('settings'), $value[0]);
                    Setting::where(['name'  => $key])->update(['ar_value' =>$path,'en_value'=>$path]);
                }
                else
                    $setting = Setting::where(['name'  => $key])->update(['ar_value' => $value[0],'en_value'=>(isset($value[1]))?$value[1]:$value[0]]);
            }

        }
    }

}
