<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
    <style>
    .table-hover tbody tr:hover {
        transform: scale(1.05);
        transition: transform 0.2s cubic-bezier(0.25, 0.1, 0.25, 1);
        background-color: rgba(0, 0, 255, 0.1);
        cursor: pointer;

    }
    </style>
</head>

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
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#collection').DataTable({
            "order": [
                [4, "desc"]
            ]
        });
    });
    </script>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.cursor-pointer');
        rows.forEach(row => {
            row.addEventListener('mouseover', function() {
                this.style.backgroundColor = 'rgba(0, 0, 255, 0.1)';
                this.style.transition = 'background-color 0.5s ease';
            });
            row.addEventListener('mouseout', function() {
                this.style.backgroundColor = 'transparent';
                this.style.transition = 'background-color 0.5s ease';
            });
            row.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                window.location.href = url;
            });
        });
    });
    </script> -->
</body>













</html>