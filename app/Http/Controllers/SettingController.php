<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function changeBlogSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['blog_view']==0)
        {
            $data['blog_view']=1;
        }
        else
        {
            $data['blog_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeDirectorySetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['directory_view']==0)
        {
            $data['directory_view']=1;
        }
        else
        {
            $data['directory_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeYearbookSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['yearbook_view']==0)
        {
            $data['yearbook_view']=1;
        }
        else
        {
            $data['yearbook_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeAboutUsSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['about_us_view']==0)
        {
            $data['about_us_view']=1;
        }
        else
        {
            $data['about_us_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeContactUsSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['contact_us_view']==0)
        {
            $data['contact_us_view']=1;
        }
        else
        {
            $data['contact_us_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeGallerySetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['gallery_view']==0)
        {
            $data['gallery_view']=1;
        }
        else
        {
            $data['gallery_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeDonationSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['donation_view']==0)
        {
            $data['donation_view']=1;
        }
        else
        {
            $data['donation_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeLoginSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['login_view']==0)
        {
            $data['login_view']=1;
        }
        else
        {
            $data['login_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }
    public function changeRegisterSetting()
    {
        $settings  = Storage::disk('local')->get('settings.json');
        $data = json_decode($settings,true);
        if($data['register_view']==0)
        {
            $data['register_view']=1;
        }
        else
        {
            $data['register_view']=0;
        }
        // return $data;
        Storage::put('settings.json',json_encode($data));
        return "success";
    }

}
