@extends('layouts.master')

@section('title', 'Edit Category')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Edit Category</h4>
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
                <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    
                    <div class="mb-3">
                        <label >Category Name</label>
                        <input type="text" class="form-control" value="{{ $category -> name }}" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label >Category Slug</label>
                        <input type="text" class="form-control" value="{{ $category -> slug }}" id="slug" name="slug" required>
                    </div>

                    <div class="mb-3">
                        <label >Category Description</label>
                        <textarea class="form-control" id="description"  name="description" rows="5" required>{{ $category -> description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" class="form-control"  name="image" >
                    </div>

                    <div class="mb-3">
                        <label >Meta Title</label>
                        <input type="text" class="form-control" value="{{ $category -> meta_title }}" id="meta_title" name="meta_title" required>
                    </div>

                    <div class="mb-3">
                        <label >Meta Description</label>
                        <textarea class="form-control"  id="meta_description" name="meta_description" rows="3" required>{{ $category -> meta_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >SEO Tags</label>
                        <textarea class="form-control"  id="meta_keywords" name="meta_keywords" rows="3" required>{{ $category -> meta_keywords }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label >NavBar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked':'' }}  >

                    </div>
                    <div class="mb-3">
                        <label >Category Status</label>
                        <input type="checkbox"  name="status" {{ $category->status == '1' ? 'checked':'' }} >

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Update Category</button>


                    


                </form>
                </div>


        
    </div>
@endsection