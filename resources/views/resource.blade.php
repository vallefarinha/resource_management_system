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

<!-- Mensaje de alerta de éxito -->

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
        {{ $resource->tag->tag_name }}  ·  {{ $resource->type->type_name }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $resource->title }}</h5>
        <p class="card-text">{{ $resource->user->name }}</p>
        <p class="card-text">{{ $resource->link }}</p>

        <!-- Contenedor para los botones -->
        <div class="btn-group" role="group" aria-label="Botones de edición y eliminación">
            <!-- Botón de EDIT -->
            <form method="GET" action="{{ route('resource.edit', ['id' => $resource->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">EDIT</button>
            </form>
            
            <!-- Botón de DELETE -->
            <form action="{{ route('resource.delete', ['resource' => $resource->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-body-secondary">
        {{ $resource->created_at }}
    </div>
</div>


@endsection

</body>

</html>
