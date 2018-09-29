@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de fornecedores', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.supplier.list.get', 'method' => 'get'])}}

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

    @component('componentes.box', ['title' => 'Listagem de fornecedores', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.supplier.create.get')}}">
                &nbsp;Cadastrar</a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Id</center></th>
                <th><center>Nome</center></th>
                <td><center>Editar</center></td>
            </tr>
            </thead>

            <tbody>

            @foreach($suppliers as $supplier)
                <tr>
                    <td><center>{{$supplier->id}}</center></td>
                    <td><center>{{$supplier->name}}</center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.supplier.update.get', $supplier->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$suppliers->appends(request()->all())->render()}}

    @endcomponent

@endsection