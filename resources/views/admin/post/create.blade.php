@extends('layouts.master')

@section('title', 'Add Post')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Add Post</h4>
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
                <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="mb-3">
                        <label>Post Category</label>
<select name="category_id" class="form-control">
    @foreach ($category as $cateitem)
        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
    @endforeach
</select>
                       
                    </div>

                    <div class="mb-3">
                        <label >Post Title</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label >Post Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>

                    <div class="mb-3">
                        <label >Post Description</label>
                        <textarea class="form-control" id="mysummernote" name="description" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label >Youtube Iframe</label>
                        <input type="text" class="form-control" id="yt_iframe" name="yt_iframe" >
                    </div>

                    <div class="mb-3">
                        <label >Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" required>
                    </div>

                    <div class="mb-3">
                        <label >Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label >SEO Tags</label>
                        <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label >Post Status</label>
                        <input type="checkbox" name="status" >

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Save Post</button>


                    


                </form>
                </div>


        
    </div>
@endsection