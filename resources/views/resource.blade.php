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
            <div class="row mb-3">
                <div class="col">
                    <h5 class="card-title" style="font-size: 1.5rem; color: #333; margin-bottom: 8px;">{{ $resource->title }}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="card-text" style="font-size: 1rem; color: #666; margin-bottom: 20px;">{{ $resource->user->name }}</p>
                </div>
            </div>

            <div class="btn-group gap-3" role="group" aria-label="Edit and delete buttons">

                @if ($resource->isFile())
                <a href="{{ route('resource.download', ['resource' => $resource->id]) }}" class="btn btn-primary rounded-circle" style="width: 40px; height: 40px; line-height: 24px;" download="{{ $resource->title }}"> <i class="fa-solid fa-download"></i> Download</a>
                @else
                <a href="{{ $resource->link }}" class="btn btn-primary rounded-circle ms-3" target="_blank">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                @endif

                <form method="GET" action="{{ route('resource.edit', ['id' => $resource->id]) }}">
                    @csrf

                    <button type="submit" class="btn btn-success rounded-circle" style="width: 40px; height: 40px; line-height: 24px;"><i class="fa-solid fa-pen-to-square"></i></button>

                </form>

                <button type="submit" class="btn btn-warning rounded-circle" style="width: 40px; height: 40px; line-height: 24px;" data-toggle="modal" data-target="#extraModal"><i class="fa-solid fa-plus"></i></button>

      
                <div class="modal fade" id="extraModal" tabindex="-1" role="dialog" aria-labelledby="extraModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="extraModalLabel">Add Extra Link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('resource.extra') }}" method="POST" onsubmit="document.getElementById('submitButton').disabled = true;">
                                    @csrf
                                    <div class="form-group">
                                        <p for="id_tag">Estás añadiendo extras a {{ $resource->title }} </p>
                                        <input type="hidden" name="id_resource" value="{{ $resource->id }}">
                                        <input type="hidden" name="id_tag" value="{{ $resource->tag->id }}">
                                        <label for="extra_name">Extra name:</label>
                                        <input type="text" class="form-control" id="extra_name" name="extra_name" autocomplete="off" required>
                                        <label for="extra_link">Extra resource link:</label>
                                        <input type="text" class="form-control" id="extra_link" name="extra_link" title="Por favor, introduce una dirección URL" pattern="(?:www\..+|https?://.+)" placeholder="http:// or www" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.form.submit();">Submit</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="delete-form" action="{{ route('resource.delete', ['resource' => $resource->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger rounded-circle" style="width: 40px; height: 40px; line-height: 24px;" data-toggle="modal" data-target="#deleteModal"><i class="fa-solid fa-trash"></i></button>
                </form>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" form="delete-form" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6 mx-auto" style="text-align: left;">
            <h2 class="mt-3 mb-3">Extras:</h2>
            <ul class="list-group list-group-flush" style="margin-left: 0; padding-left: 0;">
                @foreach ($resource->extra as $extra)
                <li class="list-group-item" style="border-radius: 0; border: 1px solid #ccc;"><a href="{{ $extra->extra_link }}" target="_blank">{{ $extra->extra_name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="card-footer text-body-secondary text-end">
            Created at: {{ $resource->created_at }}
        </div>
    </div>

    @endsection

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>