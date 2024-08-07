@extends('layouts.master')

@section('title', 'Edit Post')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Edit Post</h4>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                     
                        <label>Post Category</label>
<select name="category_id" class="form-control">
    <option value="">--Select Category--</option>
    @foreach ($category as $cateitem)
        <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected' : '' }}> {{ $cateitem->name }}</option>
    @endforeach
</select>
                       
                    </div>

                    <div class="mb-3">
                        <label >Post Title</label>
                        <input type="text" class="form-control" value="{{ $post->name }}"  id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label >Post Slug</label>
                        <input type="text" class="form-control" value="{{ $post->slug }}"  id="slug" name="slug" required>
                    </div>

                    <div class="mb-3">
                        <label >Post Description</label>
                        <textarea class="form-control" id="mysummernote" name="description" rows="5" required>{!! $post->description !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >Youtube Iframe</label>
                        <input type="text" class="form-control" value="{{ $post->yt_iframe }}" id="yt_iframe" name="yt_iframe" >
                    </div>

                    <div class="mb-3">
                        <label >Meta Title</label>
                        <input type="text" class="form-control" value="{{ $post->meta_title }}"  id="meta_title" name="meta_title" required>
                    </div>

                    <div class="mb-3">
                        <label >Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3" required>{!! $post->meta_description !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >SEO Tags</label>
                        <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3" >{!! $post->meta_keywords !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >Post Status</label>
                        <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':''}} >

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Save Post</button>


                    


                </form>
                </div>


        
    </div>
@endsection