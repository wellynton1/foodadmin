@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastro de cliente', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.customer.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => 'enterprise.customer.create.post', 'method' => 'post'])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

            </div>

        </div>


        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">CPF</label>
                {{Form::text('cpf', null, array('class' => 'form-control', 'id' => 'cpf'))}}

            </div>
            <div class="col-lg-6">
                <label for="">Apelido</label>
                {{Form::text('nickname', null, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label for="">E-mail</label>
                {{Form::text('email', null, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-4">
                <label for="">Telefone Residencial</label>
                {{Form::text('phone', null, array('class' => 'form-control', 'id' => 'phone'))}}

            </div>

            <div class="col-lg-4">
                <label for="">Whatsapp</label>
                {{Form::text('whatsapp', null, array('class' => 'form-control', 'id' => 'whatsapp'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label for="">Logradouro</label>
                {{Form::text('street', null, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-4">
                <label for="">Bairro</label>
                {{Form::text('district', null, array('class' => 'form-control'))}}

            </div>

            <div class="col-lg-4">
                <label for="">Cep</label>
                {{Form::text('cep', null, array('class' => 'form-control', 'id' => 'cep'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Complemento</label>
                {{Form::text('complemento', null, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Ponto de Referência</label>
                {{Form::text('reference_point', null, array('class' => 'form-control'))}}

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

@section('js')

    {!!  Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')!!}

    <script>


        $("#phone").inputmask("(99)9999-9999", {
            autoUnmask: true,
            placeholder:''
        });

        $("#cep").inputmask("99999-999", {
            autoUnmask: true,
            placeholder:''
        });

        $("#whatsapp").inputmask("(99)99999-9999", {
            autoUnmask: true,
            placeholder:''
        });

        $("#cpf").inputmask("999.999.999-99", {
            autoUnmask: true,
            placeholder:''
        });

    </script>


@endsection

<div class="form-group m-form__group row">
    <div class="col-lg-4">
        <label for="">Logradouro</label>
        {{Form::text('street', $customer->street, array('class' => 'form-control'))}}

    </div>
    <div class="col-lg-4">
        <label for="">Bairro</label>
        {{Form::text('district', $customer->district, array('class' => 'form-control'))}}

    </div>

    <div class="col-lg-4">
        <label for="">Cep</label>
        {{Form::text('cep', $customer->cep, array('class' => 'form-control'))}}

    </div>

</div>

<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label for="">Complemento</label>
        {{Form::text('complement', $customer->adress->customer, array('class' => 'form-control'))}}

    </div>

</div>

<div class="form-group m-form__group row">
    <div class="col-lg-12">
        <label for="">Ponto de Referência</label>
        {{Form::text('reference_point', null, array('class' => 'form-control'))}}

    </div>

</div>