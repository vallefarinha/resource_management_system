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
    <div class="container">
        <div class="container d-flex"><a href="{{ url()->previous() }}" class="btn btn-light rounded-circle ms-3"><i
                    class="fa-solid fa-rotate-left"></i></a>
        </div>

        <h1 class="m-5">Add your contribution</h1>
        <form class="row g-3 m-5" action="{{ route('store.resource') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-8">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" required name="title" placeholder="Write a title">
            </div>
            <div class="col-md-4">
                <label for="id_type" class="form-label">Type</label>
                <select name="id_type" class="form-select" required>
                    <option selected>Choose...</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="id_tag" class="form-label">Tag</label>
                <select name="id_tag" class="form-select" required>
                    <option selected>Choose...</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" required>{{ $tag->tag_name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-6">
                <label for="id_user" class="form-label">User</label>
                <select name="id_user" class="form-select" required>
                    <option selected>Choose...</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="addType" class="form-label">What do you want to add?</label>
                <select id="addType" name="addType" class="form-select" required>
                    <option value="file">File</option>
                    <option value="link">Link</option>
                </select>
            </div>

            <div class="col-md-6" id="fileInput" style="display:none;">
                <label for="file" class="form-label">Select File</label>
                <input type="file" name="file" class="form-control">
            </div>

            <div class="col-md-6" id="linkInput" style="display:none;">
                <label for="link" class="form-label">Enter Link</label>
                <input type="text" name="link" class="form-control">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary is-invalid">Add</button>
            </div>
        </form>


        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


    </div>

    @endsection


    <script>
    document.getElementById('addType').addEventListener('change', function() {
        var addType = this.value;
        if (addType === 'file') {
            document.getElementById('fileInput').style.display = 'block';
            document.getElementById('linkInput').style.display = 'none';
        } else if (addType === 'link') {
            document.getElementById('fileInput').style.display = 'none';
            document.getElementById('linkInput').style.display = 'block';
        }
    });
    </script>
</body>

</html>