@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update blog Details
                </div>
                <div class="card-body">
                        @include('layouts.message')
                        <form class="form" id="form" action="{{ route('blog.update',array($blog->id)) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">Blog title <span class="required_sign">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title"  value="{{ isset($blog->title) ? $blog->title : old('title') }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title">Category </label>
                                <select class="form-control js-example-basic-multiple2" id="edit_cat_id" name="cat_id[]" multiple>
                                    <option value="">-- Select category --</option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                             <div class="col-md-12 mb-3">
                                <label for="title">Content</label>
                                <textarea class="form-control" id="text_editor1" name="content">{{ isset($blog->content) ? $blog->content : old('content') }}</textarea>
                            </div>
                            <input type="hidden" id="edit_cat_ids" value="{{ $blog->cat_id }}">
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection