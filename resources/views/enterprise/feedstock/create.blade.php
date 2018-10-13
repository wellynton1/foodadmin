@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastro de insumo', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.menu.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => 'enterprise.feedstock.create.post', 'method' => 'post'])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

            </div>

        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Estoque mínimo</label>
                {{Form::text('minimum_stock', null, array('class' => 'form-control', 'placeholder' => ''))}}
            </div>

            <div class="col-lg-6">
                <label for="">Unidade de medida</label>
                {{Form::select('unit_of_measurement_id', $unitMeasurements, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}

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