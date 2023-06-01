@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Manage Blog</h5>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a href="{{ route('blog.create') }}" class="btn btn-primary addbtn">Add new blog</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts.message')
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Blog Title</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Created Date & Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($blog_post))
                                @foreach($blog_post as $k => $val)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $val['title'] }}</td>
                                        <td>{{ $val['cat_name'] }}</td>
                                        <td>{!! mb_strimwidth($val['content'],0,40,"...") !!}</td>
                                        <td>{{ $val['author_name'] }}</td>
                                        <td>{{ $val['created_at'] }}</td>
                                        <td style="display:flex;">
                                            @if(auth()->user()->is_admin == 1 || auth()->id() == $val['author_id'])
                                            <a href="{{ route('blog.edit',array($val['id'])) }}" class="btn btn-info" title="Edit blog">Edit</a>
                                            <form action="{{ route('blog.destroy', ['blog' => $val['id']]) }}" method="POST">
                                            &nbsp;&nbsp;
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog..?');" title="Delete Category">Delete</button>
                                            </form>
                                            @endif
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