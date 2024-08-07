<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()

    {
        $all_posts = Post::where('status',1)->get();
        $all_categories = Category::where('status',1)->get();
        return view('frontend.index',compact('all_categories','all_posts'));
    }

    public function category($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status',1)->first();

        if($category){
            $posts = Post::where('category_id', $category->id)->where('status',1)->paginate(10);
            return view('frontend.post.index', compact('category','posts'));
        }
        else{
            return redirect('/');
        }
    } 

    public function viewPost(string $category_slug,string  $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status',1)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->where('slug',$post_slug)->where('status',1)->first();
            $latest_posts = Post::where('category_id', $category->id)->where('status',1)->orderBy('created_at','DESC')->get();
            return view('frontend.post.view', compact('posts','latest_posts'));
        }
        else{
            return redirect('/');
        }
        
    }
}


