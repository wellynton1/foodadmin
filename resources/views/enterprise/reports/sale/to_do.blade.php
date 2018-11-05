@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de compras a fazer', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.reports.sale.find.todo.get', 'method' => 'get'])}}

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">

                    <label for="">Data de entrega</label>
                    <input type="text" name="date_delivery" id="date_delivery" class="form-control">
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

    @component('componentes.box', ['title' => 'Lista de compras', 'erro' =>0])

        @slot('action')
            @if($date_delivery!=0)
            <a class="btn white btn-outline btn btn-danger" href="{{route('enterprise.reports.sale.todo.pdf.get', $date_delivery)}}">
                Relatório PDF
                &nbsp
            </a>
            @endif

        @endslot


        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Insumo</center></th>
                <th><center>Tipo Unitário</center></th>
                <th><center>Quantidade</center></th>

            </tr>
            </thead>

            <tbody>

                @foreach($feedstocks as $feedstock)
                <tr>
                    <td><center>{{$feedstock->feedstock->name}}</center></td>
                    <td><center>{{$feedstock->feedstock->UnitOfMeasurement->name}}</center></td>
                    <td><center>{{$feedstock->feedstock_amount}}</center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{--{{$feedstocks->appends(request()->all())->render()}}--}}

    @endcomponent

@endsection

@section('js')

    {!!  Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')!!}

    <script>

        $("#date_delivery").inputmask("99/99/9999", {
            autoUnmask: true,
            placeholder:''
        });

    </script>


@endsection