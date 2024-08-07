<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        $category = category::where('status', 1)->get();
        return view('admin.post.create',compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post();

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status = true ? 1 : 0;
        $post->created_by = Auth::user()->id;
        $post->save();
        
        return redirect('admin/posts')->with('success', 'Post created successfully');


    }
    
    public function edit($id)
    {
        $category = category::where('status', 1)->get();
        $post = Post::find($id);
        return view('admin.post.edit',compact('category','post'));
    }

    public function update(PostFormRequest $request, $id)
    {
        $data = $request->validated();

        $post =  Post::find($id);

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status = true ? 1 : 0;
        $post->created_by = Auth::user()->id;
        $post->update();
        
        return redirect('admin/posts')->with('success', 'Post Update successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/posts')->with('success', 'Post deleted successfully');
    }
}
