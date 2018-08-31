@extends('layouts.master')

@section('titulo')
    Inicio
@endsection


@section('content')

    @component('componentes.box', ['cor' => 'dark', 'title' => 'Home', 'erro' => 1])

        <div class="row">

         Teste
        </div>
    @endcomponent

@endsection