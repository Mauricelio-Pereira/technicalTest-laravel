<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Test - Laravel</title>

    <!-- Bootstrap core CSS -->
    <link href = {{ asset("assets/css/bootstrap/css/bootstrap.css") }} rel="stylesheet" />

</head>
<body class="bg-dark">        
    <div class="container">
        <table class="table table-secondary table-striped">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">age</th>
                <th scope="col">email</th>
                </tr>
            </thead>
            <tbody>
                @if($paginacao)
                    @foreach($paginacao as $dado)
                        <tr>
                            <th scope="row">{{$dado['id']}}</th>
                            <td>{{$dado['name']}}</td>
                            <td>{{$dado['age']}}</td>
                            <td>{{$dado['email']}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Vazio<td> 
                    </tr>
                @endif
            </tbody>
        </table>

        {{ $paginacao->links('custom.pagination') }}

    </div>
</body>
</html>