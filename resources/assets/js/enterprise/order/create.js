require('../../bootstrap')

import CustomerService from '../../services/customerService';
import MenuService from '../../services/menuService';
import AccompanyingService from '../../services/accompanyingService';
import ProteinService from '../../services/proteinService';
import VueCurrencyFilter from 'vue-currency-filter'

Vue.use(VueCurrencyFilter,
    {
        symbol: '',
        thousandsSeparator: '.',
        fractionCount: 2,
        fractionSeparator: ',',
        symbolPosition: 'front',
        symbolSpacing: true
    });


new Vue({
    el: '#order',
    data: {
        customers: [],
        customer: '',
        menus: [],
        menu: '',
        count_menu: '',
        accompanyings: [],
        accompanying: '',
        count_accompanying: '',
        proteins: [],
        protein: '',
        count_protein: '',
        form: new Form({
            delivery_schedule: '',
            accompanyings: [],
            menus: [],
            proteins: [],
            customer_id: '',
            customer_address_id: '',
            observation: '',
            discount: '0',
            value_total_sale: '',
            descount: '',
            value_order: '',
            date_delivery: ''
        })

    },

    computed: {

        total_order() {

            var sum = this.form.menus.reduce(function (a, b) {

                return parseFloat(a) + parseFloat(b.value) * parseInt(b.amount);

            }, 0);

            var total = parseFloat(sum) - (parseFloat(sum) * parseInt(this.form.discount) / 100);

            this.form.value_total_sale = total;
            this.form.value_order = parseFloat(sum);
            return total;

        },


    },

    methods: {

        beginPreload() {

            this.loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer
            });
        },

        endPreloader() {

            this.loader.hide();

        },

        onsubmit() {
            this.beginPreload();

           this.form.customer_id = this.customer.customer?this.customer.customer.id:'';
            this.form.post(this.route_default + 'empresa/pedido/novo')
                .then((response) => {
                  this.endPreloader();
                }).catch((error) => {
                    this.endPreloader();
                $('html, body').animate({scrollTop: 0}, 'slow');

            });
        },


        getProtein(search, loading) {

            loading(true)

            ProteinService.getSelect2(search).then(resp => {
                loading(false)

                this.proteins = resp.data
            }).catch(resp => {
                loading(false)
            });
        },

        getAccompanying(search, loading) {

            loading(true)

            AccompanyingService.getSelect2(search).then(resp => {
                loading(false)

                this.customers = resp.data
            }).catch(resp => {
                loading(false)
            });
        },


        getCustomer(search, loading) {
            loading(true)

            CustomerService.getSelect2(search).then(resp => {
                loading(false)

                this.customers = resp.data
            }).catch(resp => {
                loading(false)
            });
        },

        getMenu(search, loading) {
            loading(true)
            MenuService.getSelect2(search).then(resp => {
                loading(false)

                this.menus = resp.data
            }).catch(resp => {
                loading(false)
            });
        },

        addMenu() {

            this.form.menus.push({
                id: this.menu.id,
                name: this.menu.name,
                amount: 1,
                value: this.menu.value_total_sale

            });


        },

        removeMenu(index) {

            this.form.menus.splice(index, 1);
        }

    },

});