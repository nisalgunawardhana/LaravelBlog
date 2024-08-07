@extends('layouts.app')

@section('title', "$posts->name | Tutorial")

@section('meta')
    <meta name="description" content="{{ $posts->meta_description }}">
    <meta name="keywords" content="{{ $posts->meta_keywords }}">


@section('content')
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="category-heading">
          <h4 class="mb-0">{!! $posts->name !!}</h4>
        </div>
        <div>
            <h6>
                {{ $posts->category->name .'/'. $posts->name }}
            </h6>
        </div>

        <div class="card card-shadow mt-4">
          <div class="card-body">
            {!! $posts->description !!}
          </div>
        </div>

        <div class="comment-area mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif

        


    <div class="card card-body">
        <h6 class="card-title">Leave a comment</h6>
        <form action="{{url('comment')}} " method="POST">
            @csrf
            <input type="hidden" name="post_slug" value="{{ $posts->slug }}">
            <textarea name="comment_body" class="form-control" rows="3" required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    @forelse ($posts->comments as $commet_item)


    <div class="card card-body shadow-sm mt-3">
        <div class="detail-area">
            <h6 class="user-name mb-1">
               @if($commet_item->user)
                {{ $commet_item->user->name}}
                @endif
                <small class="ms-3 text-primary">Commented on: {{$commet_item->created_at}}</small>
            </h6>
            <p class="user-comment mb-1">
                {{ $commet_item->comment_body }}
            </p>
            @if(Auth::check())
            <div>
              <button type="button" value="$commet_item->id" id="btn-edit-comment" class="btn btn-primary btn-sm me-2">Edit</button>
              <button type="button" value="$commet_item->id"  class="btn btn-danger btn-sm btn-delete-comment">Delete</button>
            </div>
          
            @endif
        </div>
    </div>
    @empty
    <div class="alert alert-warning">
        No comments found
    </div>
@endforelse
</div>




      </div>
      <div class="col-md-3">
        <div class="border p-2 myl">
          <h4>Advertising Area</h4>
        </div>

        <div class="card mt-3">
          <div class="card-header">
    <h4>Latest Posts</h4>
  </div>
  <div class="card-body">
    @foreach ($latest_posts as $latest_post_item)
      <a href="{{ $latest_post_item->url }}" class="text-decoration-none">
        <h6>{{ $latest_post_item->name }}</h6>
      </a>
    @endforeach
  </div>
</div>


      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
       
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

        $(document).on('click', '.btn-delete-comment', function() {
          

            if(confirm('Are you sure you want to delete this comment?')) {
               var thisClickedButton = $(this);
               var commentId = thisClickedButton.val();

                $.ajax({
                    type: 'POST',
                    url: "/comment-delete",
                    data: {
                      _token: '{{ csrf_token() }}',
                        comment_id: commentId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status == 'success') {
                            thisClickedButton.closest().remove();
                        }
                        else {
                            alert('Error deleting comment');
                        }
                    }
                });
            }
        });
        
    });
    </script>
@endsection
