@extends('layouts.master')

@section('title', 'Add Category')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Add Category</h4>
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
                <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label >Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label >Category Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>

                    <div class="mb-3">
                        <label >Category Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" class="form-control"  name="image" required>
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
                        <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label >NavBar Status</label>
                        <input type="checkbox" name="navbar_status" >

                    </div>
                    <div class="mb-3">
                        <label >Category Status</label>
                        <input type="checkbox" name="status" >

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Add Category</button>


                    


                </form>
                </div>


        
    </div>
@endsection