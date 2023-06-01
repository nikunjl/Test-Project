@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Logs</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>User</th>
        <th>Type</th>
        <th>Old Data</th>
        <th>New Data</th>
        <th>TimeStamp</th>
        </tr>
        @foreach ($logs as $key => $log)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ isset($log->User->name) ? $log->User->name : '' }}</td>
                <td>{{ $log->type }}</td> 
                <td>{{ $log->old_data }}</td> 
                <td>{{ $log->new_data }}</td>  
                <td>{{ $log->created_at }}</td>  
            </tr>
        @endforeach
    </table>

    {!! $logs->render() !!}

@endsection