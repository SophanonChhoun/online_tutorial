import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
import SingleImageUploader from "../components/SingleImageUploader";
new Vue({
    el: '#editCategory',
    components: {
        Multiselect,
        SingleSelect,
        SingleImageUploader
    },
    data: {
        data: data,
        id: data.id,
        is_submit: false,
        error: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/category/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/category/list';
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
