@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$errors}}</div>
                @endforeach
            </div>
            @endif

        <div class="card-header">
            <h4>Add Post
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{url('admin/add-post')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">-- Select Category --</option>
                        @foreach ($category as $cateitem)
                            <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">description</label>
                    <textarea name="description" id="mySummernote" cols="" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>
                <br>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" id="" cols="" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword" id="" cols="" rows="3" class="form-control"></textarea>
                </div>
                <br>

                <h4>Status Mode</h4>
                <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-8 mb-4">
                    <button type="submit" class="btn btn-primary float-end">
                        Save Post
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection
