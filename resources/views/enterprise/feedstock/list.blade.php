@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de insumos', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.feedstock.list.get', 'method' => 'get'])}}
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

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

    @component('componentes.box', ['title' => 'Listagem de insumos', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.feedstock.create.get')}}">
                &nbsp;Cadastrar</a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Id</center></th>
                <th><center>Nome</center></th>
                <th><center>Estoque Mínimo</center></th>
                <th><center>Estoque Atual</center></th>
                <th><center>Unidade de Medida</center></th>
                <td><center>Editar</center></td>
            </tr>
            </thead>

            <tbody>

            @foreach($feedstocks as $feedstock)
                <tr>
                    <td><center>{{$feedstock->id}}</center></td>
                    <td><center>{{$feedstock->name}}</center></td>
                    <td><center>{{$feedstock->minimum_stock}}</center></td>
                    <td><center>{{$feedstock->current_stock}}</center></td>
                    <td><center>{{$feedstock->unitOfMeasurement->name}}</center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.feedstock.update.get', $feedstock->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$feedstocks->appends(request()->all())->render()}}

    @endcomponent

@endsection