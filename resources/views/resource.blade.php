<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
</head>
<body>
    @extends('navbar')

    @section('navbar')
    <div class="card text-center">
    <div class="card-header">
        {{ $resource->type->type_name }}
        {{ $resource->tag->tag_name }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $resource->title }}</h5>
        <p class="card-text">{{ $resource->user->name }}</p>
        <p class="card-text">{{ $resource->link }}</p>
        <a href="#" class="btn btn-success">DOWNLOAD</a>
        <a href="{{route('edit')}}" class="btn btn-primary">EDIT</a>
        <a href="{{route('delete')}}" class="btn btn-danger">DELETE</a>
    </div>
    <div class="card-footer text-body-secondary">
        {{ $resource->created_at }}
    </div>
</div>

    @endsection
</body>
</html>