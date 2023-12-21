<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:website-list', ['only' => ['index','show']]);
    }

    // //SEO Page Show Method
    // public function seo()
    // {
    //     $data=DB::table('seos')->first();
    //     return view('admin.setting.seo',compact('data'));
    // }

    // //SEO Update method
    // public function seoUpdate(Request $request,$id)
    // {
    //     $data=array();
    //     $data['meta_title']=$request->meta_title;
    //     $data['meta_author']=$request->meta_author;
    //     $data['meta_tag']=$request->meta_tag;
    //     $data['meta_keyword']=$request->meta_keyword;
    //     $data['meta_description']=$request->meta_description;
    //     $data['google_verification']=$request->google_verification;
    //     $data['alexa_verification']=$request->alexa_verification;
    //     $data['google_analytics']=$request->google_analytics;
    //     $data['google_adsense']=$request->google_adsense;
    //     DB::table('seos')->where('id',$request->id)->update($data);

    //     $notification=array('messege' => 'SEO Setting Updated!', 'alert-type' => 'success');
    //     return redirect()->back()->with($notification);

    // }

    // //SMTP Setting Page
    // public function smtp()
    // {
    //     // $smtp=DB::table('smtp')->first();
    //     return view('admin.setting.smtp');
    // }

    // //SMTP Update
    // public function smtpUpdate(Request $request){
    //     // $data=array();
    //     // $data['mailer']=$request->mailer;
    //     // $data['host']=$request->host;
    //     // $data['port']=$request->port;
    //     // $data['user_name']=$request->user_name;
    //     // $data['password']=$request->password;
    //     // DB::table('smtp')->where('id',$id)->update($data);
        
    //     // $notification=array('messege' => 'SMTP Setting Updated!', 'alert-type' => 'success');
    //     // return redirect()->back()->with($notification);

    //     foreach($request->types as $key=>$type){
    //         $this->updateEnvFile($type, $request[$type]);
    //     }
    //     $notification=array('messege' => 'SMTP Setting Updated!', 'alert-type' => 'success');
    //     return redirect()->back()->with($notification);
    // }

    //Website Setting
    public function website()
    {
        $setting=DB::table('settings')->first();
        return view('admin.setting.website_setting',compact('setting'));
    }

    //Website Setting update
    public function WebsiteUpdate(Request $request,$id)
    {
        $data=array();
        $data['phone']=$request->phone;
        $data['main_email']=$request->main_email;
        $data['support_email']=$request->support_email;
        $data['address']=$request->address;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['youtube']=$request->youtube;
        if ($request->logo) {
              $logo=$request->logo;
              $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
              Image::make($logo)->resize(320,120)->save('public/files/setting/'.$logo_name); 
            $data['logo']='public/files/setting/'.$logo_name;  
        }else{
            $data['logo']=$request->old_logo;
        }

        if ($request->favicon) {
              $favicon=$request->favicon;
              $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
              Image::make($favicon)->resize(32,32)->save('public/files/setting/'.$favicon_name); 
              $data['favicon']='public/files/setting/'.$favicon_name;  
        }else{
            $data['favicon']=$request->old_favicon;
        }

        DB::table('settings')->where('id',$id)->update($data);
        
        $notification=array('messege' => 'Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Your Password has been Updated!','');
                Auth::logout();
                return redirect()->back();
            }else
            {
                Toastr::error('New pass cannot be same old password','errors');
                return redirect()->back();
            }
        }else
        {
            Toastr::error('Old password cannot be match','');
            return redirect()->back();
        }

    }
}
