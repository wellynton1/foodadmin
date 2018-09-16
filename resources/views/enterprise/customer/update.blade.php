@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar cliente', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.customer.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => ['enterprise.customer.update.post', $customer->id], 'method' => 'post'])}}

        <input type="hidden" name="id_customer" value="{{$customer->id}}">

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Nome</label>
                {{Form::text('name', $customer->user->name, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">CPF</label>
                {{Form::text('cpf', $customer->cpf, array('class' => 'form-control', 'id' => 'cpf'))}}

            </div>
            <div class="col-lg-6">
                <label for="">Apelido</label>
                {{Form::text('nickname', $customer->nickname, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label for="">E-mail</label>
                {{Form::text('email', $customer->user->email, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-4">
                <label for="">Telefone</label>
                {{Form::text('phone', $customer->phone, array('class' => 'form-control'))}}

            </div>

            <div class="col-lg-4">
                <label for="">Whatsapp</label>
                {{Form::text('whatsapp', $customer->whatsapp, array('class' => 'form-control'))}}

            </div>

        </div>


        <br><br>

        <div class="form-group m-form__group row">
            <div class="col-lg-1">
                {{Form::submit('Salvar',['class'=>'btn blue-soft'])}}

            </div>
        </div>


        {{Form::close()}}


    @endcomponent

@endsection