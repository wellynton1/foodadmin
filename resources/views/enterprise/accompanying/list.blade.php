@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de Acompanhamentos', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.accompanying.list.get', 'method' => 'get'])}}

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control">
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

    @component('componentes.box', ['title' => 'Listagem de acompanhamentos', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.accompanying.create.get')}}">
                &nbsp;Cadastrar
            </a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Id</center></th>
                <th><center>Nome</center></th>
                <th><center>Insumos</center></th>
                <td><center>Editar</center></td>
            </tr>
            </thead>

            <tbody>

            @foreach($accompanyings as $accompanying)
                <tr>
                    <td><center>{{$accompanying->id}}</center></td>
                    <td><center>{{$accompanying->name}}</center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.accompanying.feedstock.update.get', $accompanying->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.accompanying.update.get', $accompanying->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$accompanyings->appends(request()->all())->render()}}

    @endcomponent

@endsection