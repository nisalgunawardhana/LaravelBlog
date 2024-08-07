@extends('layouts.app')

@section('title', "$category->name | Tutorial")

@section('meta')
    <meta name="description" content="{{ $category->meta_description }}">
    <meta name="keywords" content="{{ $category->meta_keywords }}">

@section('content')

<div class="container  py-4">
    <div class="row">
        <div class="col-md-9">
            <div class="category-heading">
                <h4>{{ $category->name }}</h4>
            </div>
            @forelse ($posts as $post)
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href="{{ url('tutorial/' . $category->slug . '/' . $post->slug) }}">
                            <h2 class="post-heading">{{ $post->name }}</h2>
                        </a>
                        <h6>Posted On: {{ $post->created_at->format('d-m-Y') }}
                        <span class="ms-3"> Posted On: {{ $post->user->name }} </span>
                        </h6>
                        
                    </div>
                </div>
                <div class="your-paginate">
                {{ $posts->links() }}
                
                </div>
            @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h2>No post available</h2>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="col-md-3">
            <h4>Advertising Area</h4>
        </div>
    </div>
</div>


@endsection