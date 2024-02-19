<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
    <style>
    .table-hover tbody tr:hover {
        transform: scale(1.05);
        transition: transform 0.5s ease-in-out;
        background-color: rgba(0, 0, 255, 0.1);
        cursor: pointer;

    }
    </style>
</head>
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

<body>
    @extends('navbar')
    @section('view')
    <div class="container pt-3">
        <table id="collection" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Tag</th>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Number of resources</th>
                    <th scope="col">Date of creation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collections as $collection)
                <tr class="cursor-pointer"
                    onclick="window.location='{{ route('resource.resource', ['resource' => $collection->id]) }}'">
                    <td>{{ $collection->tag->tag_name }}</td>
                    <td>{{ $collection->type->type_name }}</td>
                    <td>{{ $collection->title }}</td>
                    <td>{{ $collection->countTotalExtras() }}</td>
                    <td>{{ $collection->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @endsection
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#collection').DataTable({
            "order": [
                [4, "desc"]
            ]
        });
    });
    </script>
</body>


</html>
