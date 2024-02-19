<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @extends('navbar')
    @section('view')
    <div class="container min-vh-100 d-flex text-center align-items-center">
        <div class="jumbotron">
            <h1 class="display-1">Welcome!</h1>
            <p class="lead fs-3">Welcome to our resource management platform! An easy wat to add and explore resources shared by your peers to enhance your learning journey!</p>
            <hr class="my-5">
            <p class="fs-3">What would you like to do today?</p>
            <div class="container-fluid">
                <a href="{{ route('add') }}" role="button" class="btn btn-success rounded-circle btn-lg mr-5" style="width: 70px; height: 70px; line-height: 55px">
                    <i class="fas fa-plus" style="font-size: 24px; padding: -15px -10px;"></i>
                </a>
                <a href="{{ route('collection') }}" role="button" class="btn btn-primary rounded-circle btn-lg" style="width: 70px; height: 70px; line-height: 55px;">
                    <i class="fas fa-list" style="font-size: 24px; "></i>
                </a>
            </div>
        </div>
    </div>
    @endsection


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // If you want to automatically activate the active tab
        var triggerEl = document.querySelector("#navId a");
        bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>
</body>

</html>
