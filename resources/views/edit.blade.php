@extends('navbar')

@section('view')
<div class="container">
    <h1 class="m-5">Edit Resource</h1>
    <form class="row g-3 m-5" action="{{ route('resource.update', ['id' => $resource->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- O usa @method('PATCH') dependiendo de tu configuración --}}
        <div class="col-8">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" required name="title" value="{{ $resource->title }}">
        </div>
        <div class="col-md-4">
            <label for="id_type" class="form-label">Type</label>
            <select name="id_type" class="form-select" required>
                @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $type->id == $resource->id_type ? 'selected' : '' }}>{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="id_tag" class="form-label">Tag</label>
            <select name="id_tag" class="form-select" required>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ $tag->id == $resource->id_tag ? 'selected' : '' }}>{{ $tag->tag_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="id_user" class="form-label">User</label>
            <select name="id_user" class="form-select" required>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $resource->id_user ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</div>
@endsection
