<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT Resources Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @extends('navbar')
    @section('view')
    <div class="container min-vh-100 d-flex text-center align-items-center">
        <div class="jumbotron">
            <h1 class="display-1">Bienvenidx</h1>
            <p class="lead fs-3">¡Bienvenidx a nuestra plataforma de gestión de recursos! ¡Agrega y explora fácilmente
                los recursos
                compartidos por tus compañerxs para mejorar tu camino de aprendizaje!</p>
            <hr class="my-5">
            <p class="fs-3">¿Qué quieres hacer hoy?</p>
            <div class="container-fluid">
                <a class="btn btn-success rounded-circle btn-lg m-2" href="{{route('add')}}" role="button"><i
                        class="fa fa-plus"></i></a>
                <a class="btn btn-primary rounded-circle btn-lg" href="{{route('collection')}}" role="button"><i
                        class="fa fa-list"></i></a>
            </div>
        </div>
    </div>
    @endsection


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Se você deseja ativar a guia ativa automaticamente
    var triggerEl = document.querySelector("#navId a");
    bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>
</body>

</html>
