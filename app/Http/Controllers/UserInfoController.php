<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Carbon;
use Image; //use imageintervantion package for image

class UserInfoController extends Controller
{
     public function ShowUserInfo(){
        $info=UserInfo::all();
        return view('show_info',compact('info'));
     }//end method


      public function index(){
        return view("user_info");
      }//end method

      public function StoreUserInfo(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'image'=>'required',
            'gender'=>'required',
            'skills'=>'required',
        ],[
           'name.required'=> 'User name is required',
           'email.required'=> 'User Email is required',
           'image.required'=> 'Image is required',
           'gender.required'=> 'Gender is required',
           'skills.required'=> 'User Skills is required',
        ]);
        
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430,327)->save('upload/userpic/'.$name_gen);
        $save_url = 'upload/userpic/'.$name_gen;
        
        UserInfo::insert([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $save_url, //save image in database
            'gender' => $request->gender,
            'skills' =>json_encode($request->skills),
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
            'message' => 'user Create Successfully', 
            'alert-type' => 'success'
        );
      
        return redirect()->route('userinfo')->with($notification);
    }//end method

    public function EditUserInfo($id){
         
        $info=UserInfo::findOrFail($id);      
        return view('edit_info',compact('info')); 
    }//end method
    

    public function UpdateUserInfo(Request $request){
        $user_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/userpic/'.$name_gen);
            $save_url = 'upload/userpic/'.$name_gen;

            UserInfo::findOrFail($user_id)->update([
                'name' => $request->name,
                'email' => $request->email,               
                'image' => $save_url, //save image in database
                'gender' => $request->gender,  
                'skills' => $request->skills,    

            ]); 
            $notification = array(
            'message' => 'User Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('userinfo')->with($notification);

        } else{

        UserInfo::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,                           
            'gender' => $request->gender,  
            'skills' => $request->skills,    

        ]); 
        $notification = array(
        'message' => 'User Updated without Image Successfully', 
        'alert-type' => 'success'
        );

         return redirect()->route('userinfo')->with($notification);
        }
        }//End Method
    
    public function DeleteUserInfo($id){
        $info= UserInfo::findOrFail($id);
        $img=$info->image;
        unlink($img); //delete the image form upload/portfolio storage
        UserInfo::findOrFail($id)->delete(); //delete the image from row
 
        $notification = array(
         'message' => 'User Image Deleted  Successfully', 
         'alert-type' => 'success'
        );
 
       return redirect()->back()->with($notification);
    }//End Method
    
}
