import SingleImageUploader from "../components/SingleImageUploader";
import {error} from "vue-infinite-loading/src/utils";
import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
new Vue({
    el: '#createUser',
    components: {
        SingleImageUploader,
        Multiselect,
        SingleSelect
    },

    data: {
        data: {
            name: '',
            email: '',
            first_name: '',
            last_name: '',
            gender: '',
            phone_number: '',
            address: '',
            is_enable: '',
            password: '',
            image: '',
            role_id: '',
            role: '',
        },
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
        roles: roles,
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(!this.data.image)
                {
                    this.error_image = "The Image field is required";
                    save = false;
                }else{
                    this.error_image = "";
                }
                this.data.role_id = this.data.role.id;
                if(result && save) {
                    axios.post('/admin/user/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/user/list';
                       }else{
                           alert(response.data.data)
                           hideLoading()
                       }
                    }).catch(error => {
                        showAlertError(error.response.data.message)
                        hideLoading()
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
        },

        uploadImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                var img = new Image();
                img.onload = function() {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.image = e.target.result
                        }
                        reader.readAsDataURL(input.files[0])
                }
            }
        },

        uploadAddingImage(event) {
            let image = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event => {
                Vue.set(this.data, 'image', event.target.result)
            }
        },
    }
});
