<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Home
    public function index(){
        $post = Post::get();
        // $items = Post::whereDate('created_at', Carbon::now()->hour)->get()->count();
        // dd($items);
        $date1 = date('g', time());
        // dd($date1);
        return view('admin.home.index',compact('post','date1'));
    }
}
