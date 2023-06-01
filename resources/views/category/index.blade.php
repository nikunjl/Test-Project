@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Manage Category</h5>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a href="{{ route('category.create') }}" class="btn btn-primary addbtn">Add new category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts.message')
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Title</th>
                                <th>Category Slug</th>
                                <th>Sub Category</th>
                                <th>Category Status</th>
                                <th>Created Date & Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($categories))
                                @foreach($categories as $k => $val)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $val->title }}</td>
                                        <td>{{ $val->slug }}</td>
                                        <td>
                                            @if(isset($catArray[$val->parent_id]['title']))
                                                {{ $catArray[$val->parent_id]['title'] }}
                                            @else
                                                {{ '--' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($val->status ==1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $val->created_at }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('category.edit',array($val->id)) }}" class="btn btn-info" title="Edit Category">Edit</a>
                                            <form action="{{ route('category.destroy', ['category' => $val->id]) }}" method="POST">
                                            &nbsp;&nbsp;
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category..?');" title="Delete Category">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection