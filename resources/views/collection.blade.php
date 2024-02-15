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
    <table class="table table-striped">
        <thead>
            <tr>

                <th scope="col">Tag</th>
                <th scope="col">Type</th>
                <th scope="col">Number of resources</th>
                <th scope="col">Date of creation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($collections as $collection)
            <tr>
                <th scope="row"></th>
                <td>{{$collection->tag->tag_name}}</td>
                <td>{{$collection->type->type_name}}</td>
                <td>{{$collection->title}}</td>
                <td>{{$collection->->user->name}}</td>
                <td>{{$collection->->user->name}}</td>
                <td>{{$collection->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>

</html>