@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastrar de Proteína', 'erro' =>1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.menu.list.get')}}">
                &nbsp;Voltar
            </a>

        @endslot

        {{Form::open(['route' => ['enterprise.menu.protein.list.create', $id]])}}

        <div class="form-group m-form__group row">
            <div class="col-lg-6">

                <label for="">Proteína</label>
                {{Form::select('protein_id', $proteins, null, array('class' => 'form-control', 'placeholder' => 'Selecione'))}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                    <input type="submit" class="btn blue-soft" value="Enviar">
                </div>
            </div>
        </div>

        {{Form::close()}}

    @endcomponent

    @component('componentes.box', ['title' => 'Listagem de proteínas', 'erro' =>0])



        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th>
                    <center>Nome</center>
                </th>

                <td>
                    <center>Excluir</center>
                </td>
            </tr>
            </thead>

            <tbody>

            @foreach($menuProtein as $protein)
                <tr>
                    <td>
                        <center>{{$protein->protein->name}}</center>
                    </td>
                    <td>
                        <center>
                            {{Form::open(['route' => ['enterprise.menu.protein.list.delete', $protein->id]])}}
                            <button class="btn btn-danger" type="submit"><i class="flaticon-delete-1"
                                                                            aria-hidden="true"></i></button>
                            {{Form::close()}}
                        </center>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$menuProtein->appends(request()->all())->render()}}

    @endcomponent

@endsection