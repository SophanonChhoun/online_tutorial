import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#CreateCustomer',
    data: {
        data: data,
        id: data.id,
        is_submit: false,
        identification_type: identification_type,
        error: '',
    },
    components: {SingleSelect,Multiselect},
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                this.data.identification_type_id = this.data.identification_type.id;

                if(result && save) {
                    axios.post('/admin/customer/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/customer/list';
                        }else{
                            alert(response.data.data)
                            this.error = response.data.message;
                        }
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
        },


    }
});
