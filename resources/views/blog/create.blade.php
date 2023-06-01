@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add new blog
                </div>
                <div class="card-body">
                        @include('layouts.message')
                        <form class="form" id="form" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title">Blog Title <span class="required_sign">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title">Category </label>
                                <select class="form-control js-example-basic-multiple" name="cat_id[]" multiple>
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
                                <textarea class="form-control" id="text_editor1" name="content"></textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection