@extends('layouts.master')

@section('title', 'Edit User')
    
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4  ">
            <div class="card-header">
               <h4> <i class="fas fa-table me-1"></i>
                Edit User</h4>
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
                <div class="mb-3">
                        <label >UserName</label>
                        <input type="text" class="form-control" value="{{ $user->name }}"  id="name" name="name" required readonly>
                    </div>

                    <div class="mb-3">
                        <label >Email </label>
                        <input type="text" class="form-control" value="{{ $user->email }}"  id="slug" name="slug" required readonly>
                    </div>

                    <div class="mb-3">
                        <label >Created_at </label>
                        <input type="text" class="form-control" value="{{ $user->created_at }}"  id="slug" name="slug" required readonly>
                    </div>

                    <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label >Role </label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{ $user->role_as == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == 2 ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == 3 ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>


                    


                </form>
                </div>


        
    </div>
@endsection