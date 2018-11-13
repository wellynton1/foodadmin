@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Editar acompanhamento', 'erro' =>1])

        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.accompanying.list.get')}}">
                &nbsp;Voltar
            </a>

        @endslot

        {{Form::open(['route' => ['enterprise.accompanying.feedstock.adicionar.post', $id]])}}

        <div class="form-group m-form__group row">
                <div class="col-lg-6">

                    <label for="">Insumo</label>
                    <select name="feedstock_id" class="form-control">
                        <option value="">Selecione</option>
                        @foreach($feedstocks as $feedstock)

                            <option value="{{$feedstock->id}}">{{$feedstock->name}}
                                - {{$feedstock->unitOfMeasurement->name}}</option>

                        @endforeach

                    </select>
                </div>

                <div class="col-lg-6">

                    <label for="">Quantidade</label>
                    {{Form::text('amount', null, array('class' => 'form-control'))}}
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

    @component('componentes.box', ['title' => 'Listagem de insumos', 'erro' =>0])



        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
            <tr>
                <th>
                    <center>Insumo</center>
                </th>
                <th>
                    <center>Unidade de Medida</center>
                </th>
                <th>
                    <center>Quantidade</center>
                </th>
                <td>
                    <center>Excluir</center>
                </td>
            </tr>
            </thead>

            <tbody>

            @foreach($accompanying_feedstocks as $accompanying)
                <tr>
                    <td>
                        <center>{{$accompanying->feedstock->name}}</center>
                    </td>
                    <td>
                        <center>{{$accompanying->feedstock->unitOfMeasurement->name}}</center>
                    </td>
                    <td>
                        <center>{{$accompanying->amount}}</center>
                    </td>
                    <td>
                        <center>
                            {{Form::open(['route' => ['enterprise.accompanying.feedstock.delete.post', $accompanying->id]])}}
                            <button class="btn btn-danger" type="submit"><i class="flaticon-edit"
                                                                            aria-hidden="true"></i></button>
                            {{Form::close()}}
                        </center>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        {{$accompanying_feedstocks->appends(request()->all())->render()}}

    @endcomponent

@endsection