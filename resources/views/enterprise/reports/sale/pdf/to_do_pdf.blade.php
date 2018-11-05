<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório Compras a fazer</title>
</head>
<body>
<table class="table table-striped table-bordered table-hover" id="sample_2">
    <thead>
    <tr>
        <th><center>Insumo</center></th>
        <th><center>Tipo Unitário</center></th>
        <th><center>Quantidade</center></th>
        <th><center>Comprado</center></th>

    </tr>
    </thead>

    <tbody>

    @foreach($feedstocks as $feedstock)
        <tr>
            <td><center>{{$feedstock->feedstock->name}}</center></td>
            <td><center>{{$feedstock->feedstock->UnitOfMeasurement->name}}</center></td>
            <td><center>{{$feedstock->feedstock_amount}}</center></td>
            <td><center>[  ]</center></td>
        </tr>
    @endforeach

    </tbody>

</table>
</body>
</html>