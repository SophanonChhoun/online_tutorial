import SingleImageUploader from "../components/SingleImageUploader";
import {error} from "vue-infinite-loading/src/utils";
import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
new Vue({
    el: '#createCourse',
    components: {
        SingleImageUploader,
        Multiselect,
        SingleSelect
    },

    data: {
        data: {
            title: '',
            description: '',
            category_id: '',
            image: '',
            category: [],
            lessons: [],
        },
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
        categories: categories,
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
                this.data.category_id = this.data.category.id;
                if(result && save) {
                    axios.post('/admin/course/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/course/list';
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

        addLessons() {
            this.data.lessons.push({
                title: '',
                duration: '',
                video_url: '',
                text_content: '',
                error: {
                    title: '',
                    duration: '',
                    video_url: '',
                    text_content: '',
                    number: '',
                    video_content: '',
                },
                sort: this.data.lessons.length + 1,
            });
        },

        removeLesson(index) {
            this.data.lessons.splice(index, 1)
            this.data.lessons.forEach(function (item, i) {
                item.sort = i + 1
            })
        },
    }
});
