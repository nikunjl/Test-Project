@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update category Details
                </div>
                <div class="card-body">
                        @include('layouts.message')
                        <form class="form" id="form" action="{{ route('category.update',array($category->id)) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">Category title <span class="required_sign">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter category title"  value="{{ isset($category->title) ? $category->title : old('title') }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title">Sub Category </label>
                                <select class="form-control" name="parent_id">
                                    <option value="">-- Select sub category title --</option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" @if($category->parent_id == $cat->id) selected @endif>{{ $cat->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="title">Category status </label>
                                <select class="form-control" name="status">
                                    @php 
                                    $status = isset($category->status) ? $category->status : old('status')
                                    @endphp
                                    <option value="0" @if($status == 0) selected @endif>Inactive</option>
                                    <option value="1" @if($status == 1) selected @endif>Active</option>
                                </select>
                            </div>
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