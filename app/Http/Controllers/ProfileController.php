<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //profile
    public function index(){
        $id = Auth::user()->id;
        // dd($id);
        $userInfo = User::select('id','name','email','phone','address','gender')->where('id',$id)->first();
        // dd($userInfo->toArray());
        return view('admin.profile.index',compact('userInfo'));
    }

    //Direct Change Password
    public function directChangePassword(){
        return view('admin.profile.changePassword');
    }

    //Change Password
    public function changePassword(Request $request){
        $dbData = User::where('id',Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        $passwordValidator = $this->userPasswordValidationCheck($request);
        if($passwordValidator->fails()){
            return back()
                        ->withErrors($passwordValidator)
                        ->withInput();
        }
        // dd($dbPassword);
        $hashNewPassword = Hash::make($request->newPassword);
        $updatePassword = [
            'password' => $hashNewPassword,
            'updated_at' => Carbon::now(),
        ];
        // dd($hashNewPassword);
        if(Hash::check($request->currentPassword, $dbPassword)){
            User::where('id',Auth::user()->id)->update($updatePassword);
            return back()->with(['updatePassword' => 'Password Successfully Updated']);
        }else{
            return back()->with(['passwordWrong' => "Passwords Didn't match"]);
        }

    }

    //Admin Account Update
    public function adminAccountUpdate(Request $request){
        $userData = $this->getUserInfo($request);
        $validator = $this->userValidationCheck($request);

        if($validator->fails()){
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        // dd($userData);
        User::where('id',Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess' => 'Account Updated Successfully']);
    }

    //messageApp
    public function messageApp(){
        return view('admin.message.index');
    }

    //getting userInfo
    private function getUserInfo($request){
        return [
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'phone' => $request->adminPhone,
            'address' => $request->adminAddress,
            'gender' => $request->adminGender,
            'updated_at' => Carbon::now(),
        ];
    }

    //User Validations
    private function userValidationCheck($request){
        return Validator::make($request->all(), [
            'adminName' => 'required',
            'adminEmail' => 'required'
            ],[
                'adminName.required' => 'Need to Fill Name',
                'adminEmail.required' => 'Need to Fill Email'
            ]);
    }

    //password Validation
    private function userPasswordValidationCheck($request){
        return Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|max:15',
            'confirmPassword' => 'required'
            ],[
                'newPassword.min' => 'Password must be at least 8 characters',
                'newPassword.max' => 'Password must be at most 15 characters',
            ]);
    }
}
