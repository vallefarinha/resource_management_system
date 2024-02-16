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

    <!-- Success alert message -->
    @if (session('success'))
    <div id="liveAlertPlaceholder">
        <div>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="card text-center">
        <div class="card-header">
            {{ $resource->tag->tag_name }} · {{ $resource->type->type_name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $resource->title }}</h5>
            <p class="card-text">{{ $resource->user->name }}</p>
            @if ($resource->isFile())
            <p class="card-text">{{ $resource->link }}
                <a href="{{ route('resource.download', ['resource' => $resource->id]) }}"
                    class="btn btn-primary rounded-circle ms-3"><i class="fa-solid fa-download"></i></a>
            </p>
            @else
            <p class="card-text">{{ $resource->link }}</p>
            @endif

            <!-- Container for edit and delete buttons -->
            <div class="btn-group gap-3" role="group" aria-label="Edit and delete buttons">
                <!-- EDIT button -->
                <form method="GET" action="{{ route('resource.edit', ['id' => $resource->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-circle"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                </form>

                <!-- DELETE button -->

                <form action="{{ route('resource.delete', ['resource' => $resource->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning rounded-circle"><i
                            class="fa-solid fa-plus"></i></button>
                </form>

                <!-- Add extra button -->

                <form action="" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger rounded-circle"><i
                            class="fa-solid fa-trash"></i></button>
                </form>


            </div>
        </div>
        <div class="card-footer text-body-secondary text-end">
            Created at: {{ $resource->created_at }}
        </div>
    </div>

    @endsection


</body>



</html>
