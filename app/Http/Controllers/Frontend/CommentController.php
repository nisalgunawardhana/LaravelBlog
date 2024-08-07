<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{
    public function comment(Request $request)
    {
        if (Auth::check()) {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Comment body is required');
            }

            // Retrieve the post
            $post = Post::where('slug', $request->post_slug)->where('status', 1)->first();

            if ($post) {
                Comment::create([
                    'post_id' => $post->id, // Corrected variable name
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);

                return redirect()->back()->with('success', 'Comment added successfully');
            } else {
                return redirect()->back()->with('error', 'Post not found');
            }
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to comment');
        }
    }

    

    public function commentDelete(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $comment_id = $request->comment_id;

            \Log::info('Deleting comment', ['user_id' => $user_id, 'comment_id' => $comment_id]);


            $comment = Comment::where('id' ,$request->comment_id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
            if ($comment) {
            // Delete the comment
            $comment->delete();
            
            // Return a success response
            return response()->json(['status' => 'success', 'message' => 'Comment deleted successfully']);
        } else {
            // Return an error response if the comment does not exist
            return response()->json(['status' => 'error', 'message' => 'Comment not found or you do not have permission to delete this comment'], 404);
        }
    } else {
        // Return an error response if the user is not logged in
        return response()->json(['status' => 'error', 'message' => 'You must be logged in to delete a comment'], 401);
    }
    }

}
