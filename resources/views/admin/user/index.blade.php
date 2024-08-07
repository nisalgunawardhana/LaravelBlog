@extends('layouts.master')

@section('title', 'Blog Dashboard')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Users
                </h4>
            </div>
            <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Users</li>
            </ol>
         <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered mt-4 "  >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th> Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role_as == 1 ? 'Admin' :'User' }}</td>
                        <td>
                        
                            <a href="{{ url('admin/edit-user/'.$item->id) }}" class="btn btn-info">Edit</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection