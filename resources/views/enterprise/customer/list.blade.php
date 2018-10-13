@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Busca de clientes', 'erro' =>1])

        {{Form::open(['route' => 'enterprise.customer.list.get', 'method' => 'get'])}}
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-6">
                <label for="">CPF</label>
                {{Form::text('cpf', null, array('class' => 'form-control'))}}

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

    @component('componentes.box', ['title' => 'Listagem de cliente', 'erro' =>0])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.customer.create.get')}}">
                &nbsp;Cadastrar</a>

        @endslot

        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th><center>Nome</center></th>
                <th><center>E-mail</center></th>
                <th><center>CPF</center></th>
                <th><center>Whatsapp</center></th>
                <th><center>Telefone</center></th>
                <th><center>Endereço</center></th>
                <td><center>Editar</center></td>
            </tr>
            </thead>

            <tbody>

            @foreach($customers as $customer)
                <tr>
                    <td><center>{{$customer->user->name}}</center></td>
                    <td><center>{{$customer->user->email}}</center></td>
                    <td><center>{{$customer->cpf}}</center></td>
                    <td><center>{{$customer->whatsapp}}</center></td>
                    <td><center>{{$customer->phone}}</center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.customer.address.get', $customer->id)}}"><i class="flaticon-map-location" aria-hidden="true"></i></a></center></td>
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.customer.update.get', $customer->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$customers->appends(request()->all())->render()}}

    @endcomponent

@endsection