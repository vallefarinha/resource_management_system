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
        {{$resources->id_type}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$resources->title}}</h5>
            <p class="card-text">{{$resources->id_user}}</p>
            <p class="card-text">{{$resources->link}}</p>
            <a href="#" class="btn btn-success">DOWNLOAD</a>
            <a href="#" class="btn btn-primary">EDIT</a>
            <a href="#" class="btn btn-danger">DELETE</a>
        </div>
        <div class="card-footer text-body-secondary">
        {{$resources->created_at}}
        </div>
    </div>
    @endsection
</body>
</html>