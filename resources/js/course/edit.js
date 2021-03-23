import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
import SingleImageUploader from "../components/SingleImageUploader";
new Vue({
    el: '#editCourse',
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
                this.data.category_id = this.data.category.id;

                if(result && save) {
                    console.log(this.id)
                    axios.post('/admin/course/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/course/list';
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
