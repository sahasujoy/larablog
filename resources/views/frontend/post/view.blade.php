@extends('layouts.app')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="category-heading">
                    <h4>{!! $post->name !!}</h4>
                </div>
                <div class="mt-3">
                    <h6>{{ $post->category->name. '/' .$post->name }}</h6>
                </div>

                <div class="card card-shadow mt-4">
                    <div class="card-body post-description">
                        {!! $post->description !!}
                    </div>
                </div>

                <div class="comment-area mt-4">
                    @if(session('message'))
                        <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                    @endif

                    <div class="card card-body">
                        <h6 class="card-title">Leave a Comment</h6>
                        <form action="{{ url('comments') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                            <textarea name="comment_body" id="" cols="" class="form-control" rows="3" required></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>

                    @forelse ($post->comments as $comment)

                    <div class="card card-body shadow-sm mt-3">
                        <div class="detail-area">
                            <h6 class="user-name mb-1">
                                @if($comment->user)
                                    {{ $comment->user->name }}
                                @endif
                                <small class="ms-3 text-primary">Commented on: {{ $comment->created_at->format('d-m-Y') }}</small>
                            </h6>
                            <p class="user-comment mb-1">
                                {!! $comment->comment_body !!}
                            </p>
                        </div>
                        @if(Auth::check() && Auth::id() == $comment->user_id)
                        <div>
                            <a href="" class="btn btn-primary btn-sm me-2">Update</a>
                            <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                        </div>
                        @endif
                    </div>

                    @empty
                    <div class="card card-body shadow-sm mt-3">
                        <h6>No Comments Yet.</h6>
                    </div>
                    @endforelse
                </div>

            </div>
            <div class="col-md-4">
                <div class="border p-2">
                    <h4>Advertising Area</h4>
                </div>
                <br>
                <div class="border p-2">
                    <h4>Advertising Area</h4>
                </div>
                <br>
                <div class="border p-2">
                    <h4>Advertising Area</h4>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($latest_posts as $latest_post_item)
                            <a href="{{ url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug) }}" class="text-decoration-none">
                                <h6> >> {{$latest_post_item->name}}</h6>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
