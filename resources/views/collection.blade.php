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
    <table id="collection" class="table table-striped">
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
            <tr>
                <td>
                    <a href="{{ route('resource', ['id' => $collection->id]) }}">
                        {{ $collection->tag->tag_name }}
                    </a>
                </td>
                <td> <a href="{{ route('resource', ['id' => $collection->id]) }}">
                        {{ $collection->type->type_name }}
                    </a>
                </td>
                <td>{{ $collection->title }}</td>
                <td>{{ $collection->user->name }}</td>
                <td>{{ $collection->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#collection').DataTable();
    });
    </script>
</body>



</html>