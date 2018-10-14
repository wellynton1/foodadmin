@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de cardápios', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.menu.list.get', 'method' => 'get'])}}
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-6">
                <label for="">Tipo Cardápio</label>
                {{Form::select('id_type_menu', $typeMenus, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}

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

    @component('componentes.box', ['title' => 'Listagem de cardápios', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.menu.create.get')}}">
                &nbsp;Cadastrar</a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Id</center></th>
                <th><center>Nome</center></th>
                <th><center>Tipo Cardápio</center></th>
                <th><center>Valor Calórico</center></th>
                <th><center>Acompanhamentos</center></th>
                <th><center>Proteínas</center></th>
                <th><center>Editar</center></th>
            </tr>
            </thead>

            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td><center>{{$menu->id}}</center></td>
                    <td><center>{{$menu->name}}</center></td>
                    <td><center>{{$menu->typeMenu->name}}</center></td>
                    <td><center>{{$menu->value_caloric}}</center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.menu.accompanying.list.get', $menu->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.menu.update.get', $menu->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.menu.update.get', $menu->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$menus->appends(request()->all())->render()}}

    @endcomponent

@endsection