<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>User</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('first_name')}">
                    <label class="control-label">
                        First Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="first_name"
                           v-model="data.first_name"
                           data-vv-as="First Name"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="First Name">
                    <span class="help-block">@{{ errors.first('first_name') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('last_name')}">
                    <label class="control-label">
                        Last Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="last_name"
                           v-model="data.last_name"
                           data-vv-as="Last Name"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Last Name">
                    <span class="help-block">@{{ errors.first('last_name') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('name')}">
                    <label class="control-label">
                        @lang('general.name')
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           v-model="data.name"
                           data-vv-as="@lang('general.name')"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Name">

                    <span class="help-block">@{{ errors.first('name') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('phone_number')}">
                    <label class="control-label">
                        Phone Number
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="phone_number"
                           v-model="data.phone_number"
                           data-vv-as="Phone Number"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Phone Number">
                    <span class="help-block">@{{ errors.first('phone_number') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('email')}">
                    <label class="control-label">
                        Email
                        <span style="color: red">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           v-model="data.email"
                           data-vv-as="Email"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Email">
                    <span class="help-block">@{{ errors.first('email') }}</span>
                </div>

                @if(request()->is("admin/user/create"))
                    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('password')}">
                        <label class="control-label">
                            Password
                            <span style="color: red">*</span>
                        </label>
                        <input type="password"
                               name="password"
                               v-model="data.password"
                               data-vv-as="Password"
                               v-validate="'required'"
                               class="form-control"
                               placeholder="password">
                        <span class="help-block">@{{ errors.first('password') }}</span>
                    </div>
                @endif

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('role')}">
                    <label class="control-label">
                        Role
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'role'"
                                 v-model="data.role"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="roles"
                                 data-vv-as="Roles"
                                 v-validate="'required'"
                                 :allow-empty="true">
                    </multiselect>
                    <span class="help-block">@{{ errors.first('role') }}</span>
                </div>



                <div class="form-group col-lg-12" :class="{'has-error' : error_image}">
                    <label class="control-label">
                        Profile
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
