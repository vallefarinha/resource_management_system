<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container min-vh-100 d-flex text-center align-items-center">
        <div class="jumbotron">
            <h1 class="display-1">Welcome!</h1>
            <p class="lead fs-3">Welcome to our resource management website! Here, you can easily add your own
                resources and
                explore what your fellow coursemates are contributing. Start sharing and discovering valuable resources
                to enhance your learning journey together!</p>
            <hr class="my-4">
            <p class="fs-3">Choose your path: Add a resource or explore our resource library.</p>
            <p class="lead ">
                <a class="btn btn-primary btn-lg" href="{{route('add')}}" role="button">Add</a>
                <a class="btn btn-primary btn-lg" href="{{route('collection')}}" role="button">Collection</a>

            </p>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    var triggerEl = document.querySelector("#navId a");
    bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>
</body>


</html>
