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
            <p class="card-text">{{ $resource->link }}</p>
            
            <form action="{{ route('resource.delete', ['resource' => $resource->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#extraModal">
            Add Extra
            </button>



        </div>
        <div class="card-footer text-body-secondary">
            {{ $resource->created_at }}
        </div> 
    </div>
    
    @endsection

 
    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
        
    



</body>

</html>
