@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add new category
                </div>
                <div class="card-body">
                        @include('layouts.message')
                        <form class="form" id="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title">Category title <span class="required_sign">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter category title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title">Sub Category </label>
                                <select class="form-control" name="parent_id">
                                    <option value="">-- Select sub category title --</option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                             <div class="col-md-12 mb-3">
                                <label for="title">Category status </label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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