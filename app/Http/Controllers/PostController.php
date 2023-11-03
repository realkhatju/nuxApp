<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //post page
    public function index(){
        $post = Post::get();
        $userInfo = User::get();
        $userDetails = Auth::user()->id;
        // dd($userInfo->toArray());
        // dd($userDetails);
        return view('admin.post.index',compact('post','userInfo','userDetails'));
    }

    //create post
    public function createPost(Request $request){
        $validation = $this->postValidationCheck($request);
        if($validation->fails()){
            return back()
                        ->withErrors($validation)
                        ->withInput();
        }
        if(!empty($request->postImage)){
            $file = $request->file('postImage');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/postImage',$fileName);
            $data = $this->getPostData($request,$fileName);
        }else{
            $data = $this->getPostData($request,null);
        }
        // $userInfo = User::get();
        // $userDetails = Auth::user()->id;
        // $post = Post::get();
        // dd($userInfo->toArray());
        // dd($request->toArray());
        // $file = $request->file('postImage');
        // $fileName = uniqid().'_'.$file->getClientOriginalName();
        // $file->move(public_path().'/postImage',$fileName);
        // $data = $this->getPostData($request,$fileName);
        // dd($data);
        Post::create($data);
        // $date1 = date('g', time());
        return redirect('home')->with(['updateSuccess'=>"Your post was sent"]);
        // dd($fileName);
    }

     //getPostData
     private function getPostData($request,$fileName){
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'image' => $fileName,
            'category_id' => $request->postDescriptionName,
            'id' => $request->userId,
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
    }

    //post validation check
    private function postValidationCheck($request){
        return Validator::make($request->all(),[
            'postTitle' => 'required',
            'postDescription' => 'required',
            // 'postDescriptionName' => 'required'
        ],[
            'postTitle.required' => 'No Post Title Found',
            'postDescription.required' => 'No Post Description Found',
            // 'postDescriptionName.required' => 'Choose Post Description Name',
        ]);
    }
}
