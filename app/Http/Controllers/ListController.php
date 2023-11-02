<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //List
    public function index(){
        $userList = User::select('id','name','email','phone','address','gender')->get();
        // dd($userList->toArray());
        return view('admin.list.index',compact('userList'));
    }

    //Delete User Account
    public function deleteUserAccount($id){
        User::where('id',$id)->delete();
        return back()->with(["accountDelete" => "User Account Deleted!"]);
    }

    //Admin List Search
    public function adminListSearch(Request $request){
        // dd($request->all());
        $userList = User::orWhere('name','LIKE','%'.$request->nameSearchKey.'%')
                    ->orWhere('email','LIKE','%'.$request->nameSearchKey.'%')
                    ->orWhere('phone','LIKE','%'.$request->nameSearchKey.'%')
                    ->orWhere('address','LIKE','%'.$request->nameSearchKey.'%')
                    ->orWhere('gender','LIKE','%'.$request->nameSearchKey.'%')
                    ->get();
        // dd($userList->toArray());
        return view('admin.list.index',compact('userList'));
    }
}
