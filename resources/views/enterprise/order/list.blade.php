@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de pedidos', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.order.list.get', 'method' => 'get'])}}

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                    <label for="">Número do Pedido</label>
                    <input type="text" name="id" class="form-control">
                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                    <input type="submit" class="btn blue-soft" value="Enviar">
                </div>
            </div>
        </div>

        {{Form::close()}}

    @endcomponent

    @component('componentes.box', ['title' => 'Listagem de pedidos', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.order.create.get')}}">
                &nbsp;Cadastrar</a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Número do Pedido</center></th>
                <th><center>Cliente</center></th>
                <td><center>Data de Entrega</center></td>
                <td><center>Valor do Pedido</center></td>
                <td><center>Desconto %</center></td>
                <td><center>Valor Total do Pedido</center></td>
            </tr>
            </thead>

            <tbody>

            @foreach($orders as $order)
                <tr>
                    <td><center>{{$order->id}}</center></td>
                    <td><center>{{$order->customer->user->name}}</center></td>
                    <td><center>{{$order->date_delivery}}</center></td>
                    <td><center>{{number_format((double)$order->value_order, 2, ',', '.')}}</center></td>
                    <td><center>{{$order->descount}}</center></td>
                    <td><center>{{number_format((double)$order->value_total_sale, 2, ',', '.')}}</center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$orders->appends(request()->all())->render()}}

    @endcomponent

@endsection