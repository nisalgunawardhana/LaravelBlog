@extends('layouts.master')

@section('title', 'Blog Dashboard')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                view Post
                <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">posts</li>
            </ol>
       <div class="table-responsive">     
        <table id="myDataTable" class="table table-bordered mt-4 "  >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post Title</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status == '0' ? 'Hidden':'Shown' }}</td>
                        <td>
                        
                            <a href="{{ url('admin/edit-post/'.$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('admin/delete-post/'.$item->id) }}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

</div>
</div>
@endsection
