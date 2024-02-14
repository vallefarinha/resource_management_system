<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
</head>

<body>
    @extends('navbar')

    @section('navbar')
    <div class="container">
        <h1 class="m-5">Add your contribution</h1>
        <form class="row g-3 m-5" action="{{ route('store_resource') }}" method="POST" enctype="multipart/form-data">
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
            <div class="col-md-12 mt-4">
                <input type="file" name="link" class="form-control" aria-label="file example" required>
                <div class="invalid-feedback">Please choose a file</div>
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
</body>




</html>
