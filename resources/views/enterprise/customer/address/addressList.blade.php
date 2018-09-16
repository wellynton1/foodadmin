@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Listagem de endereços cliente: '.$customer->user->name, 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.customer.list.get')}}">
                &nbsp;Voltar
            </a>
            &nbsp;&nbsp;
            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.customer.address.new.get', $customer->id)}}">
                &nbsp;Novo
            </a>
        @endslot

        @foreach($customer->addressesCustomer as $key => $addressCustomer)

            <h4>Endereço {{$key+1}}</h4>
            <br>
            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Logradouro:</strong>
                </label>
                <label class="control-label col-lg-10">
                    {{$addressCustomer->address->street}}
                </label>
            </div>
            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Bairro:</strong>
                </label>
                <label class="control-label col-lg-10">
                    {{$addressCustomer->address->district}}
                </label>
            </div>

            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Bairro:</strong>
                </label>
                <label class="control-label col-lg-10">
                    {{$addressCustomer->address->cep}}
                </label>
            </div>

            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Complemento:</strong>
                </label>
                <label class="control-label col-lg-10">
                    {{$addressCustomer->address->complement}}
                </label>
            </div>

            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Ponto de Referência:</strong>
                </label>
                <label class="control-label col-lg-10">
                    {{$addressCustomer->address->reference_point}}
                </label>
            </div>

            <div class="form-group m-form__group row">
                <label class="control-label col-lg-2">
                    <strong>Editar:</strong>
                </label>
                <label class="control-label col-lg-1">
                    <td><center><a class="btn blue-soft" href="{{route('enterprise.customer.address.edit.get', $addressCustomer->id)}}"><i class="flaticon-edit" aria-hidden="true"></i></a></center></td>


                </label>
            </div>

        @endforeach

    @endcomponent

@endsection

@section('js')

    {{--{!!  Html::script('plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')!!}--}}

    {{--<script>--}}


    {{--$("#phone").inputmask("(99)9999-9999", {--}}
    {{--autoUnmask: true,--}}
    {{--placeholder:''--}}
    {{--});--}}

    {{--$("#cep").inputmask("99999-999", {--}}
    {{--autoUnmask: true,--}}
    {{--placeholder:''--}}
    {{--});--}}

    {{--$("#whatsapp").inputmask("(99)99999-9999", {--}}
    {{--autoUnmask: true,--}}
    {{--placeholder:''--}}
    {{--});--}}

    {{--$("#cpf").inputmask("999.999.999-99", {--}}
    {{--autoUnmask: true,--}}
    {{--placeholder:''--}}
    {{--});--}}

    {{--</script>--}}


@endsection

{{--<div class="form-group m-form__group row">--}}
{{--<div class="col-lg-4">--}}
{{--<label for="">Logradouro</label>--}}
{{--{{Form::text('street', $customer->street, array('class' => 'form-control'))}}--}}

{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<label for="">Bairro</label>--}}
{{--{{Form::text('district', $customer->district, array('class' => 'form-control'))}}--}}

{{--</div>--}}

{{--<div class="col-lg-4">--}}
{{--<label for="">Cep</label>--}}
{{--{{Form::text('cep', $customer->cep, array('class' => 'form-control'))}}--}}

{{--</div>--}}

{{--</div>--}}

{{--<div class="form-group m-form__group row">--}}
{{--<div class="col-lg-12">--}}
{{--<label for="">Complemento</label>--}}
{{--{{Form::text('complement', $customer->adress->customer, array('class' => 'form-control'))}}--}}

{{--</div>--}}

{{--</div>--}}

{{--<div class="form-group m-form__group row">--}}
{{--<div class="col-lg-12">--}}
{{--<label for="">Ponto de Referência</label>--}}
{{--{{Form::text('reference_point', null, array('class' => 'form-control'))}}--}}

{{--</div>--}}

{{--</div>--}}