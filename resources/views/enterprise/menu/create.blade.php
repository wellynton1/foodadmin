@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastro de cardápio', 'erro' => 1])


        @slot('action')

            <a class="btn white btn-outline btn blue-soft" href="{{route('enterprise.menu.list.get')}}">
                &nbsp;Voltar</a>
        @endslot


        <form @submit.prevent="onSubmit" @keydown="form.errors.clear()" id="menu">

        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label for="">Nome</label>
                {{Form::text('name', null, array('class' => 'form-control', 'v-model' => 'form.name'))}}
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('name') }}</span>

            </div>

            <div class="col-lg-6">
                <label for="">Status Cardápio</label>
                <select name="status_menu_id" v-model="form.status_menu_id" class="form-control">
                    <option v-for="status in statusMenu" v-text="status.name" :value="status.id"></option>
                </select>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('status_menu_id') }}</span>

            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label for="">Valor Calórico</label>
                {{Form::text('value_caloric', null, array('class' => 'form-control', 'v-model' => 'form.value_caloric'))}}
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('value_caloric') }}</span>

            </div>

            <div class="col-lg-4">
                <label for="">Tipo Cardápio</label>
                <select name="type_menu_id" v-model="form.type_menu_id" class="form-control">
                    <option v-for="type in typeMenu" v-text="type.name" :value="type.id"></option>
                </select>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('type_menu_id') }}</span>

            </div>

            <div class="col-lg-4">
                <label for="">Valor de Venda</label>
                <money v-model="form.value_total_sale"
                       v-bind="money"
                       class="form-control">
                </money>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('value_total_sale') }}</span>

            </div>
        </div>


        <h4>Adicionar Acompanhamento</h4>

        <div class="form-group m-form__group row">
            <div class="col-lg-11">
                <label for="">Adicionar Acompanhamento</label>
                <v-select :on-search="getAccompanying" placeholder="Selecione o acompanhamento" v-model="accompanying" label="name"
                          :options="accompanyings">
                    <span slot="no-options">Nenhum Resultado Encontrado.</span>
                </v-select>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('accompanyings') }}</span>

            </div>

            <div class="col-lg-1">
                <br>
                <button @click.prevent="addAccompanying" class="btn btn-info"><i class="flaticon-plus"></i></button>
            </div>
        </div>

        <h4 v-if="form.accompanyings.length>0">Acompanhamentos Adicionados</h4>
        <br>
        <table class="table table-striped table-bordered table-hover" id="sample_2"
               v-if="form.accompanyings.length>0">
            <thead>
            <tr>
                <th>
                    <center>Nome</center>
                </th>

                <th>
                    <center>Remover</center>
                </th>
            </tr>
            </thead>

            <tbody>

            <tr v-for="(accompanying, index) in form.accompanyings">
                <td>
                    <center>@{{accompanying.name}}</center>
                </td>


                <td>
                    <center>
                        <button @click.prevent="removeAccompanying(index)" class="btn btn-danger"><i
                                    class="flaticon-delete-1"></i></button>
                    </center>
                </td>
            </tr>

            </tbody>

        </table>


        <h4>Adicionar Proteína</h4>

        <div class="form-group m-form__group row">
            <div class="col-lg-11">
                <label for="">Adicionar Proteína</label>
                <v-select :on-search="getProtein" placeholder="Selecione o proteína" v-model="protein" label="name"
                          :options="proteins">
                    <span slot="no-options">Nenhum Resultado Encontrado.</span>
                </v-select>
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('proteins') }}</span>

            </div>

            <div class="col-lg-1">
                <br>
                <button @click.prevent="addProtein" class="btn btn-info"><i class="flaticon-plus"></i></button>
            </div>
        </div>

        <h4 v-if="form.proteins.length>0">Proteínas Adicionadas</h4>
        <br>
        <table class="table table-striped table-bordered table-hover" id="sample_2"
               v-if="form.proteins.length>0">
            <thead>
            <tr>
                <th>
                    <center>Nome</center>
                </th>

                <th>
                    <center>Remover</center>
                </th>
            </tr>
            </thead>

            <tbody>

            <tr v-for="(protein, index) in form.proteins">
                <td>
                    <center>@{{protein.name}}</center>
                </td>


                <td>
                    <center>
                        <button @click.prevent="removeProtein(index)" class="btn btn-danger"><i
                                    class="flaticon-delete-1"></i></button>
                    </center>
                </td>
            </tr>

            </tbody>

        </table>


        <br>

        <div class="form-group m-form__group row">
            <div class="col-lg-12">
                <label for="">Descrição</label>
                {{Form::textarea('description', null, array('class' => 'form-control', 'v-model' => 'form.description'))}}
                &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('description') }}</span>

            </div>
        </div>


        <br><br>

        <div class="form-group m-form__group row">
            <div class="col-lg-1">
                {{Form::submit('Salvar',['class'=>'btn blue-soft'])}}

            </div>
        </div>


        </form>

    @endcomponent

@endsection

@section('js')

    {{Html::script(mix('js/enterprise/menu/create.js'))}}


@endsection