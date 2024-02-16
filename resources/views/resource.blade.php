<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
</head>

<body>
    @extends('navbar')

    @section('view')
    <div class="card text-center">
        <div class="card-header">
            {{ $resource->type->type_name }}
            {{ $resource->tag->tag_name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $resource->title }}</h5>
            <p class="card-text">{{ $resource->user->name }}</p>
            @if ($resource->isFile())
            <p class="card-text">{{ $resource->link }}</p>
            <p class="card-text"><a href="{{ route('resource.download', ['resource' => $resource->id]) }}"
                    class="btn btn-primary">Download File</a></p>
            @else
            <p class="card-text">{{ $resource->link }}</p>
            @endif

            <form action="{{ route('resource.delete', ['resource' => $resource->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>

        </div>
        <div class="card-footer text-body-secondary">
            {{ $resource->created_at }}
        </div>
    </div>

    @endsection
</body>

</html>
