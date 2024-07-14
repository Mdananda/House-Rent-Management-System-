<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(),[
                'comment_body'=>'required|string'

            ]);
             if ($validator ->fails()) {
                return redirect()->back()->with('message','Comment area is mandatory');
                # code...
             }
            $post = Post::where('slug',$request->post_slug)->where('status','0')->first();
            if ($post) {
                Comment::create([
                    'post_id' =>$post->id,
                    'user_id' =>Auth::user()->id,
                    'comment_body' =>$request->comment_body

                ]);
            }
            else {
                return redirect()->back()->with('message','na post');
            }
        }
        else {
            return redirect('login')->with('message','Loging first');
        }
    }
}
