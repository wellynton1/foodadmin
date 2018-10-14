@extends('layouts.master')

@section('content')

    <div id="accompanying">

        @component('componentes.box', ['title' => 'Cadastro de acompanhamento', 'erro' => 1])

            @slot('action')

                <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.brand.list.get')}}">
                    &nbsp;Voltar</a>
            @endslot

            <form @submit.prevent="onSubmit">

                <div class="form-group m-form__group row">
                    <div class="col-lg-12">
                        <label for="">Nome do Acompanhamento</label>
                        {{Form::text('name', null, array('class' => 'form-control', 'v-model' => 'form.name' ))}}
                        &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('name') }}</span>

                    </div>
                </div>


                <div class="form-group m-form__group row">

                    <div class="col-lg-4">
                        <label for="">Valor calórico</label>
                        {{Form::text('calorific_value', null, array('class' => 'form-control', 'disabled' => 'disabled'))}}

                    </div>
                </div>

                <h5>
                    Adicionar Insumos
                </h5>

                <br>

                <div class="form-group m-form__group row">
                    <div class="col-lg-4">
                        <label for="">Insumo</label>
                        <select name="feedstockSelected" class="form-control" v-model="form.feedstockSelected"
                                @change="changeFeedstock">
                            <option value="">Selecione</option>
                            <option v-for="feedstock in feedstocks" v-text="feedstock.name" :value="feedstock"></option>
                        </select>
                        &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('feedstockSelected') }}</span>

                    </div>
                    <div class="col-lg-4">
                        <label for="">Unidade de Medida</label>
                        {{Form::text('unitOfMeasurement', null, array('class' => 'form-control', 'disabled' => 'disabled', 'v-model' => 'form.unitOfMeasurement'))}}
                    </div>
                    <div class="col-lg-3">
                        <label for="">Quantidade</label>
                        {{Form::text('amount', null, array('class' => 'form-control', 'v-model' => 'form.amount'))}}
                        &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('amount') }}</span>

                    </div>
                    <div class="col-lg-1">
                        <br>
                        <button @click.prevent="validateFeedstock" type="button" class="btn btn-info"><i
                                    class="flaticon-add-circular-button"></i></button>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('feedstocks') }}</span>

                <div class="form-group m-form__group row">
                    <br>
                    <table class="table table-striped table-bordered table-hover" id="sample_2"
                           v-if="form.feedstocks.length>0">
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
                        </tr>
                        </thead>

                        <tbody>

                        <tr v-for="(feedstock, index) in form.feedstocks">
                            <td>
                                <center>@{{feedstock.name_feedstock}}</center>
                            </td>
                            <td>
                                <center>@{{feedstock.unitOfMeasurement}}</center>
                            </td>
                            <td>
                                <center>@{{feedstock.amount}}</center>
                            </td>
                            <td>
                                <center>
                                    <button @click.prevent="removeFeedstock(index)" class="btn btn-danger"><i
                                                class="flaticon-delete-1"></i></button>
                                </center>
                            </td>
                        </tr>

                        </tbody>

                    </table>


                </div>

                <br><br>

                <div class="form-group m-form__group row">
                    <div class="col-lg-1">
                        {{Form::submit('Salvar',['class'=>'btn blue-soft'])}}

                    </div>
                </div>
            </form>


        @endcomponent

    </div>

@endsection

@section('js')

    {{Html::script(mix('js/accompanying/create.js'))}}

@endsection