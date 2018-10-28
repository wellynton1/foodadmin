@extends('layouts.master')

@section('content')


    @component('componentes.box', ['title' => 'Cadastro de Pedido', 'erro' => 1])
        <div id="order">

            <form @submit.prevent="onsubmit" @keydown="form.errors.clear()">
            <h4>Dados do Cliente</h4>
            <br>
            <div class="form-group m-form__group row">
                <div class="col-lg-12">
                    <v-select :on-search="getCustomer" placeholder="Selecione o cliente" v-model="customer" label="name"
                              :options="customers">
                        <span slot="no-options">Nenhum Resultado Encontrado.</span>
                    </v-select>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('customer_id') }}</span>

            <br>
            <div class="m-form__section m-form__section--first" v-if="customer.customer ">
                <div class="form-group m-form__group">
                    <label for="example_input_full_name">Endereços:</label>
                    <div class="row">
                        <div class="col-xs-12 col-md-6"
                             v-for="address_customer in customer.customer.addresses_customer">
                            <label class="m-option">
							<span class="m-option__control">
								<span class="m-radio m-radio--brand m-radio--check-bold">
									<input type="radio" v-model="form.customer_address_id" name="m_option_1" :value="address_customer.address.id">
									<span></span>
								</span>
							</span>
                                <span class="m-option__label">
								<span class="m-option__head">
									<span class="m-option__title">
										Bairro: @{{ address_customer.address.district }}
									</span>
									<span class="m-option__focus">
										CEP: @{{ address_customer.address.cep }}
									</span>
								</span>
								<span class="m-option__body">
									Logradouro: @{{ address_customer.address.street }}
									<br>
									Complemento: @{{ address_customer.address.complement }}
									<br>
									Ponto de Referência: @{{ address_customer.address.reference_pont }}

								</span>
							</span>
                            </label>
                        </div>
                        &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('customer_address_id') }}</span>

                    </div>
                </div>
            </div>

            <h4>Pedido</h4>

            <div class="form-group m-form__group row">
                <div class="col-lg-11">
                    <label for="">Adicionar Cardápio</label>
                    <v-select :on-search="getMenu" placeholder="Selecione o cardápio" v-model="menu" label="name"
                              :options="menus">
                        <span slot="no-options">Nenhum Resultado Encontrado.</span>
                    </v-select>
                    &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('menus') }}</span>

                </div>

                <div class="col-lg-1">
                    <br>
                    <button @click.prevent="addMenu" class="btn btn-info"><i class="flaticon-plus"></i></button>
                </div>
            </div>

            {{--<div class="form-group m-form__group row">--}}
            {{--<div class="col-lg-11">--}}
            {{--<v-select :on-search="getAccompanying" placeholder="Selecione o acompanhamento" v-model="accompanying" label="name" :options="menus">--}}
            {{--<span slot="no-options">Nenhum Resultado Encontrado.</span>--}}
            {{--</v-select>--}}
            {{--</div>--}}

            {{--<div class="col-lg-1">--}}
            {{--<button class="btn btn-info"><i class="flaticon-plus"></i></button>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group m-form__group row">--}}
            {{--<div class="col-lg-11">--}}
            {{--<v-select :on-search="getProtein" placeholder="Selecione a proteína" v-model="protein" label="name" :options="proteins">--}}
            {{--<span slot="no-options">Nenhum Resultado Encontrado.</span>--}}
            {{--</v-select>--}}
            {{--</div>--}}

            {{--<div class="col-lg-1">--}}
            {{--<button class="btn btn-info"><i class="flaticon-plus"></i></button>--}}
            {{--</div>--}}
            {{--</div>--}}


            <h4 v-if="form.menus.length>0">Cardápios Adicionados</h4>
            <br>
            <table class="table table-striped table-bordered table-hover" id="sample_2"
                   v-if="form.menus.length>0">
                <thead>
                <tr>
                    <th>
                        <center>Cardápio</center>
                    </th>
                    <th>
                        <center>
                            Valor
                        </center>
                    </th>
                    <th>
                        <center>
                            Quantidade
                        </center>
                    </th>
                    <th>
                        <center>Remover</center>
                    </th>
                </tr>
                </thead>

                <tbody>

                <tr v-for="(menu, index) in form.menus">
                    <td>
                        <center>@{{menu.name}}</center>
                    </td>

                    <td>
                        <center>@{{menu.value | currency}}</center>
                    </td>

                    <td>
                        <center>
                            <select class="form-control" v-model="menu.amount">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </center>
                    </td>
                    <td>
                        <center>
                            <button @click.prevent="removeMenu(index)" class="btn btn-danger"><i
                                        class="flaticon-delete-1"></i></button>
                        </center>
                    </td>
                </tr>

                </tbody>

            </table>


            <br>

            <div class="form-group m-form__group row">
                <div class="col-lg-12">
                    <label for="">Observações</label>
                    <textarea name="observation" v-model="form.observation" id="" cols="30" rows="10"
                              class="form-control"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group m-form__group row">
                <div class="col-lg-4">
                    <label for="">Melhor horário para entrega</label>
                    <input type="text" v-mask="'##:##'" v-model="form.delivery_schedule" class="form-control">
                    &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('delivery_schedule') }}</span>

                </div>

                <div class="col-lg-4">
                    <label for="">Data de entrega</label>
                    <input type="text" v-mask="'##/##/####'" v-model="form.date_delivery" class="form-control">
                    &nbsp;&nbsp;&nbsp; <span class="errors">@{{ form.errors.get('date_delivery') }}</span>

                </div>

                <div class="col-lg-4">
                    <label for="">Desconto %</label>
                    <select name="descount" class="form-control" v-model="form.discount">
                        <option value="0">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select>
                </div>

            </div>
            <br>
            <h5><strong>Valor Total: @{{ total_order | currency }}</strong></h5>

            {{--<h4>Acompanhamentos Adicionados</h4>--}}
            {{--<table class="table table-striped table-bordered table-hover" id="sample_2"--}}
            {{--v-if="form.accompanyings.length>0">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th>--}}
            {{--<center>Acompanhamento</center>--}}
            {{--</th>--}}
            {{--<th>--}}
            {{--<center>--}}
            {{--Quantidade--}}
            {{--</center>--}}
            {{--</th>--}}
            {{--<th>--}}
            {{--<center>Remover</center>--}}
            {{--</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}

            {{--<tbody>--}}

            {{--<tr v-for="(accompanying, index) in form.accompanyings">--}}
            {{--<td>--}}
            {{--<center>@{{accompanying.name}}</center>--}}
            {{--</td>--}}

            {{--<td>--}}
            {{--<center>--}}
            {{--<select class="form-control" v-model="accompanying.quantidade">--}}
            {{--<option value="1">1</option>--}}
            {{--<option value="2">2</option>--}}
            {{--<option value="3">3</option>--}}
            {{--<option value="4">4</option>--}}
            {{--<option value="5">5</option>--}}
            {{--<option value="6">6</option>--}}
            {{--<option value="7">7</option>--}}
            {{--<option value="8">8</option>--}}
            {{--<option value="9">9</option>--}}
            {{--<option value="10">10</option>--}}
            {{--</select>--}}
            {{--</center>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<center>--}}
            {{--<button @click.prevent="removeFeedstock(index)" class="btn btn-danger"><i--}}
            {{--class="flaticon-delete-1"></i></button>--}}
            {{--</center>--}}
            {{--</td>--}}
            {{--</tr>--}}

            {{--</tbody>--}}

            {{--</table>--}}

            {{--<h4>Proteína Adicionados</h4>--}}
            {{--<table class="table table-striped table-bordered table-hover" id="sample_2"--}}
            {{--v-if="form.proteins.length>0">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th>--}}
            {{--<center>Proteína</center>--}}
            {{--</th>--}}
            {{--<th>--}}
            {{--<center>Quantidade</center>--}}
            {{--</th>--}}
            {{--<th>--}}
            {{--<center>Remover</center>--}}
            {{--</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}

            {{--<tbody>--}}

            {{--<tr v-for="(protein, index) in form.proteins">--}}
            {{--<td>--}}
            {{--<center>@{{menu.name}}</center>--}}
            {{--</td>--}}

            {{--<td>--}}
            {{--<center>--}}
            {{--<select class="form-control" v-model="form.protein.quantidade">--}}
            {{--<option value="1">1</option>--}}
            {{--<option value="2">2</option>--}}
            {{--<option value="3">3</option>--}}
            {{--<option value="4">4</option>--}}
            {{--<option value="5">5</option>--}}
            {{--<option value="6">6</option>--}}
            {{--<option value="7">7</option>--}}
            {{--<option value="8">8</option>--}}
            {{--<option value="9">9</option>--}}
            {{--<option value="10">10</option>--}}
            {{--</select>--}}
            {{--</center>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<center>--}}
            {{--<button @click.prevent="removeFeedstock(index)" class="btn btn-danger">--}}
            {{--<i class="flaticon-delete-1"></i>--}}
            {{--</button>--}}
            {{--</center>--}}
            {{--</td>--}}
            {{--</tr>--}}

            {{--</tbody>--}}

            {{--</table>--}}
            <br>

            <br>
            <div class="form-group m-form__group row">
                <div class="col-lg-12">
                    <button type="submit" class="btn blue-soft">Confirmar Pedido</button>
                </div>
            </div>

            </form>
        </div>

    @endcomponent

@endsection

@section('js')

    {{Html::script(mix('js/enterprise/order/create.js'))}}

@endsection