@extends('layouts.master')

@section('title', 'Categories')
    
@section('content')

<div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                view Categories
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Categories</li>
            </ol>

            <table class="table table-bordered mt-4 "  >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset('uploads/category/'.$item->image) }}" alt="" width="50px" hight="50px"></td>
                        <td>{{ $item->status == '0' ? 'Hidden':'Shown' }}</td>
                        <td>
                        
                            <a href="{{ url('admin/edit-category/'.$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
    </div>
    </div>
    </div>
</div>
</div>

@endsection