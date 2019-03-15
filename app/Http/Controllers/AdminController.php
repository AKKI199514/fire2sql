<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Post;
use App\PostAttachment;
use App\UserFirebase;
use App\Admin;
use Hash;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                ->with('page_title','Dashboard');
    }

    public function customer_list()
    {
        $user = User::get();
        return view('admin.customer_list')
                ->with('user',$user)
                ->with('page_title','Customer List');
    }

    public function postlist()
    {
        $abc = Post::with('post_picture')->with('post_comments')->where('id',1)->get();
        //$abc = Post::with('userfire')->get();
        //$abc = PostAttachment::with('post')->get();
        /*with(array('userfire'=>function($query){
                        $query->select('id','email');
                        }))->get();*/
        //print_r($abc->toJSON());
        echo "<pre>"; print_r($abc);
    }


    // --------------------------------------------------------------------------------------------------- //
}
