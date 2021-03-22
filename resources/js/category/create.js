
new Vue({
    el: '#createCategory',

    data: {
        data: {
            name: '',
            is_enable: '',
        },
        is_submit: false,
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(result && save) {
                    axios.post('/admin/category/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/category/list';
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
    }
});
