@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastro de cardápio', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.menu.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => 'enterprise.menu.create.post', 'method' => 'post'])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

            </div>

            <div class="col-lg-6">
                <label for="">Status Cardápio</label>
                {{Form::select('id_status_menu', $statusMenu, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}

            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Valor Calórico</label>
                {{Form::text('value_caloric', null, array('class' => 'form-control'))}}

            </div>

            <div class="col-lg-6">
                <label for="">Tipo Cardápio</label>
                {{Form::select('id_type_menu', $typeMenus, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}

            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Descrição</label>
                {{Form::textarea('description', null, array('class' => 'form-control'))}}

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