<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>User</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('title')}">
                    <label class="control-label">
                        Title
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="title"
                           v-model="data.title"
                           data-vv-as="Title"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Title">
                    <span class="help-block">@{{ errors.first('title') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('category')}">
                    <label class="control-label">
                        Category
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'category'"
                                 v-model="data.category"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="categories"
                                 data-vv-as="Category"
                                 v-validate="'required'"
                                 :allow-empty="false">
                    </multiselect>
                    <span class="help-block">@{{ errors.first('category') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('description')}">
                    <label class="control-label">
                        Description
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="description"
                              class="form-control"
                              cols="30"
                              rows="10"
                              v-model="data.description"
                              v-validate="'required'"
                              data-vv-as="Description"
                    ></textarea>
                    <span class="help-block">@{{ errors.first('description') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : error_image}">
                    <label class="control-label">
                        Header Image
                        <span style="color: red">*</span>
                    </label>
                    <single-image-uploader
                        :error="data.error_image"
                        label="{{ __('general.image') }}"
                        ph="400"
                        pw="300"
                        default-image="{{ asset('image/noimage.png') }}"
                        :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="data.image"
                        :name="'profile'"
                        v-validate="{required: data.image ? true : false}"
                        data-vv-as="Profile"
                    ></single-image-uploader>
                    <span class="help-block">@{{ error_image }}</span>

                </div>

                <div class="form-group col-lg-12">
                    <div v-for="(lesson,index) in data.lessons">
                        <div class="portlet blue box" >
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-picture"></i>Lesson</div>

                                <div class="tools">
                                    <a href="javascript:;" @click="removeLesson(index)">
                                        <i class="fa fa-remove fa-lg" style="color: #ffff"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('number')}">
                                    <label class="control-label">
                                        Lesson no:
                                        <span style="color: red">*</span>
                                    </label>
                                    <input type="number"
                                           name="number"
                                           v-model="lesson.number"
                                           data-vv-as="Number"
                                           v-validate="'required'"
                                           class="form-control"
                                           placeholder="Number">
                                    <span class="help-block">@{{ errors.first('number') }}</span>
                                </div>
                                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('title')}">
                                    <label class="control-label">
                                        Title
                                        <span style="color: red">*</span>
                                    </label>
                                    <input type="text"
                                           name="title"
                                           v-model="data.lessons[index].title"
                                           data-vv-as="Title"
                                           v-validate="'required'"
                                           class="form-control"
                                           placeholder="Title">
                                    <span class="help-block">@{{ errors.first('title') }}</span>
                                </div>
                                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('duration')}">
                                    <label class="control-label">
                                        Duration in minutes
                                        <span style="color: red">*</span>
                                    </label>
                                    <input type="number"
                                           name="duration"
                                           v-model="lesson.duration"
                                           data-vv-as="Duration"
                                           v-validate="'required'"
                                           class="form-control"
                                           placeholder="Duration">
                                    <span class="help-block">@{{ errors.first('duration') }}</span>
                                </div>
                                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('video_ur')}">
                                    <label class="control-label">
                                        Video Url
                                    </label>
                                    <input type="text"
                                           name="video_ur"
                                           v-model="lesson.video_url"
                                           data-vv-as="Video Url"
                                           class="form-control"
                                           placeholder="Video Url">
                                    <span class="help-block">@{{ errors.first('video_ur') }}</span>
                                </div>
                                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('video_ur')}">
                                    <label class="control-label">
                                        Text Content
                                    </label>
                                    <textarea v-model="lesson.text_content" class="form-control">

                               </textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div>

                        <button type="button" class="btn btn-primary" @click="addLessons()">Add Lessons</button>
                        <span class="help-block" style="color: red" >@{{ error_image }}</span>
                    </div>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('is_enable')}">
                    <label class="control-label">
                        @lang('general.status')
                        <span style="color: red">*</span>
                    </label>
                    <input type="checkbox"
                           style="margin-left: 2%"
                           name="is_enable"
                           v-model="data.is_enable"
                           data-vv-as="@lang('general.status')"
                           v-validate="'required'"
                    >
                    <span class="help-block">@{{ errors.first('is_enable') }}</span>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
