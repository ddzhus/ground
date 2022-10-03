@extends('layout')

@section('content')

    <form action="{{ route('upload') }}" enctype="multipart/form-data" method="post">
        @csrf
        <p>
            <input type="file" name="image" accept="image/*">
            <button type="submit" class="btn btn-primary">
                Upload
            </button>
        </p>
        <img src="{{ session('image') }}" class="img-thumbnail" alt="no image loaded">
    </form>
@endsection
