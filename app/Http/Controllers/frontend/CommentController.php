<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->with('message', 'Comment area is mandetory');
            }

            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if($post)
            {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Commented Successfully');
            }
            else
            {
                return redirect()->back()->with('message', 'No Such Post Found');
            }
        }
        else
        {
            return redirect('login')->with('message', 'Login first to Comment');
        }
    }
}
