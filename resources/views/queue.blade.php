@extends('layout')

@section('content')
    <h3>Queue</h3>
    <a href="{{ route('queue.add') }}" class="btn btn-success">Add job</a>
    <a href="{{ route('queue.clean') }}" class="btn btn-danger">Clear</a>
    <a href="{{ route('queue.retry') }}" class="btn btn-primary">Retry</a>
    <div class="row">
        <div class="col-12">
            <h5>Active</h5>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>queue</th>
                        <th>payload</th>
                        <th>attempts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($active as $q)
                        <tr>
                            <td>{{ $q->id }}</td>
                            <td>{{ $q->queue }}</td>
                            <td>{{ $q->payload }}</td>
                            <td>{{ $q->attempts }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h5>Failed</h5>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>queue</th>
                        <th>payload</th>
                        <th>exception</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($failed as $q)
                        <tr>
                            <td>{{ $q->id }}</td>
                            <td>{{ $q->queue }}</td>
                            <td>
                                <small>
                                    @dump($q->payload)
                                </small>
                            </td>
                            <td>{{ $q->exception }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
