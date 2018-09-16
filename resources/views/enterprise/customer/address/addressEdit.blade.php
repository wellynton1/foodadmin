@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar endereço de cliente', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft"
               href="{{route('enterprise.customer.address.get', $customerAddress->id_customer)}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => ['enterprise.customer.address.edit.post', $customerAddress->id_address], 'method' => 'post'])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label for="">Logradouro</label>
                {{Form::text('street', $customerAddress->address->street, array('class' => 'form-control'))}}

            </div>
            <div class="col-lg-4">
                <label for="">Bairro</label>
                {{Form::text('district', $customerAddress->address->district, array('class' => 'form-control'))}}

            </div>

            <div class="col-lg-4">
                <label for="">Cep</label>
                {{Form::text('cep', $customerAddress->address->cep, array('class' => 'form-control', 'id' => 'cep'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Complemento</label>
                {{Form::text('complement', $customerAddress->address->complement, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Ponto de Referência</label>
                {{Form::text('reference_point', $customerAddress->address->reference_point, array('class' => 'form-control'))}}

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



        $("#cep").inputmask("99999-999", {
            autoUnmask: true,
            placeholder: ''
        });


    </script>


@endsection