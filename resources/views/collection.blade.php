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
    <table id="tabela-dados">
        <thead>
            <tr>
                <th>Coluna 1</th>
                <th>Coluna 2</th>
                <!-- Adicione mais colunas conforme necessário -->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
    $(document).ready(function() {
        $('#tabela-dados').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/dados',
            columns: [{
                    data: 'campo1',
                    name: 'campo1'
                },
                {
                    data: 'campo2',
                    name: 'campo2'
                },
                // Adicione mais colunas conforme necessário
            ]
        });
    });
    </script>
    @en
    dse
    ction
    @endsection

</body>

</html>