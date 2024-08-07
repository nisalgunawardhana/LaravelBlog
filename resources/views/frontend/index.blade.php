@extends('layouts.app')

@section('title')
    Home

@endsection
@section('meta')
    <meta name="description" content="Home">
    <meta name="keywords" content="Home">
    @endsection

@section('content')

    <div class="bg-danger  py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                <div class="owl-carousel category-carousel owl-theme">
                     @foreach($all_categories as $all_category)

                    <div class="item">
                    <a href="{{url('tutorial/'.$all_category->slug)}}">
                   
                        <div class="card">
                            <img src="{{asset('uploads/category/'.$all_category->image)}}" alt="Image">
                            <div class="card-body">
                                <h4>{{$all_category->name}} </h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="bg-light py-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome to Our Blog</h2>
                <p>Discover the latest articles, tutorials, and insights on various topics. Our blog covers a wide range of subjects, including technology, programming, design, and more. Whether you're a beginner or an experienced professional, you'll find valuable information and resources to enhance your knowledge and skills.</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Latest Posts</h2>
                <div class="row">
                    @foreach($all_posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->name }}</h5>
                                    <a href="{{ url('post/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection