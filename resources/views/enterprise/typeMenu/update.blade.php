@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar Tipo cardápio', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.typemenu.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::model($typeMenu, ['route' => ['enterprise.typemenu.update.post', $typeMenu->id]])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control'))}}

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