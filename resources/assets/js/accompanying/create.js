require('./../bootstrap')

new Vue({

    el: '#accompanying',

    data: {

        feedstocks: [],

        form: new Form({
            name: '',
            calorific_value:'',
            feedstocks: [],
            unitOfMeasurement: '',
            feedstockSelected: '',
            amount: '',
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

            this.form.post(this.route_default + 'empresa/acompanhamento/novo')
                .then(response => {
                    this.endPreloader();
                    self.$swal({
                        position: 'top-center',
                        type: 'success',
                        title: 'Acompanhamento cadastrado com sucesso!',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.value) {

                            window.location.replace(self.route_default+'empresa/acompanhamento/lista');

                        }
                    });
                }).catch(response => {
                this.endPreloader();

            });

        },

        validateFeedstock() {
            this.form.errors.clear();
            this.form.post(this.route_default + 'empresa/acompanhamento/valida/insumo')
                .then(this.addFeedstock.bind(this))

        },

        getFeedstock() {

            return axios.get(this.route_default + 'empresa/ajax/insumos')
                .then((response) => this.feedstocks = response.data);

        },

        changeFeedstock() {
            this.form.unitOfMeasurement = this.form.feedstockSelected.unit_of_measurement.name;
        },

        addFeedstock() {

            this.form.feedstocks.push({
                feedstock_id: this.form.feedstockSelected.id,
                name_feedstock: this.form.feedstockSelected.name,
                unitOfMeasurement: this.form.feedstockSelected.unit_of_measurement.name,
                amount: this.form.amount
            });

            this.clearFeedstock();
        },

        clearFeedstock() {
            this.form.amount = '';
            this.form.feedstockSelected = '';
            this.form.unitOfMeasurement = '';
        },

        removeFeedstock(index) {

            this.form.feedstocks.splice(index, 1);

        },
        //
        // messageSucess(texto, type) {
        //     this.$swal({
        //         position: 'top-center',
        //         type: type == 1 ? 'success' : 'danger',
        //         title: texto,
        //         showConfirmButton: false,
        //         timer: 1500
        //     });
        // }

    },

    created() {

        this.getFeedstock();

    }

});