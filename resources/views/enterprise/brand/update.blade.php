@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar marca', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.brand.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::model($brand, ['route' => ['enterprise.brand.update.post', $brand->id]])}}

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