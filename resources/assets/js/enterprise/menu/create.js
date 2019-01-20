require('../../bootstrap')

import AccompanyingService from '../../services/accompanyingService'
import ProteinService from '../../services/proteinService'
import TypeMenuService from '../../services/typeMenuService'
import StatusMenuService from '../../services/statusMenuService'
import money from 'v-money'

Vue.use(money);


new Vue({

    el: '#menu',

    data: {
        money: {
            precision: 2,
            decimal:',',
            thousands:'.'
        },
        accompanyings: [],
        proteins: [],
        accompanying:'',
        protein:'',
        typeMenu:[],
        statusMenu:[],

        form: new Form({
            name: '',
            description:'',
            status_menu_id:'',
            type_menu_id:'',
            accompanyings: [],
            proteins: [],
            value_total_sale:'',
            value_total_cost:'',
            value_caloric:''

        }),

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

        onSubmit() {

            this.beginPreload();

            var self = this;

            this.form.post(this.route_default + 'empresa/cardapio/novo')
                .then(response => {
                    this.endPreloader();
                    self.$swal({
                        position: 'top-center',
                        type: 'success',
                        title: 'Cardápio cadastrado com sucesso!',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.value) {

                           window.location.replace(self.route_default+'empresa/cardapio/lista');

                        }
                    });
                }).catch(response => {
                this.endPreloader();
                $('html, body').animate({scrollTop: 0}, 'slow');


            });

        },


        getTypeMenu(){

          return TypeMenuService.listAll()
              .then(response => this.typeMenu = response.data)

        },

        getStatusMenu(){

          return StatusMenuService.listAll()
              .then(response => this.statusMenu = response.data)

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

                this.accompanyings = resp.data
            }).catch(resp => {
                loading(false)
            });
        },




        addAccompanying() {

            if(this.accompanying!=''){
                this.form.accompanyings.push({
                    accompanying_id: this.accompanying.id,
                    name: this.accompanying.name,
                });

                this.accompanying = '';
            }else{

              this.messageStatus('É necessário incluir ao menos um item!', 2)

            }


        },


        removeAccompanying(index) {

            this.form.accompanyings.splice(index, 1);

        },


        addProtein() {

            if(this.protein!=''){
                this.form.proteins.push({
                    protein_id: this.protein.id,
                    name: this.protein.name,
                });

                this.protein = '';
            }else{

              this.messageStatus('É necessário incluir ao menos um item!', 2)

            }


        },


        removeProtein(index) {

            this.form.proteins.splice(index, 1);

        },



        messageStatus(texto, type) {
            this.$swal({
                position: 'top-center',
                type: type == 1 ? 'success' : 'error',
                title: texto,
                showConfirmButton: true,
               // timer: 1500
            });
        }

    },

    created() {

        this.getTypeMenu();
        this.getStatusMenu();

    }

});