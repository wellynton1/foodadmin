@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar acompanhamento', 'erro' => 1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.accompanying.list.get')}}">
                &nbsp;Voltar</a>
        @endslot

        {{Form::open(['route' => ['enterprise.accompanying.update.post', $accompanying->id], 'method' => 'post'])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Nome</label>
                {{Form::text('name', $accompanying->name, array('class' => 'form-control'))}}

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