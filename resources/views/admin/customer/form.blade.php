

<div class="col-md-12">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Customer</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('fname')}">
                    <label class="control-label">
                        First Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="fname"
                           v-model="data.first_name"
                           data-vv-as="First Name"
                           v-validate="'required|alpha'"
                           class="form-control"
                           placeholder="First Name">

                    <span class="help-block">@{{ errors.first('fname') }}</span>

                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('lname')}">
                    <label class="control-label">
                        Last Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="lname"
                           v-model="data.last_name"
                           data-vv-as="Last Name"
                           v-validate="'required|alpha'"
                           class="form-control"
                           placeholder="Last Name">

                    <span class="help-block">@{{ errors.first('lname') }}</span>
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
                           v-validate="'required|email'"
                           class="form-control"
                           placeholder="Email">

                    <span style="color:red"  class="help-block">@{{ errors.first('email') }} </span>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('password')}">
                    <label class="control-label">
                        Password
                        <span style="color: red">*</span>
                    </label>
                    <input type="password"
                           name="password"
                           v-model="data.password"
                           data-vv-as="password"
                           v-validate="'required|min:6'"
                           class="form-control"
                           placeholder="password"
                           ref="password"
                    >

                    <span class="help-block">@{{ errors.first('password') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('confirm_password')}">
                    <label class="control-label">
                        Confirm Password
                        <span style="color: red">*</span>
                    </label>
                    <input type="password"
                           name="confirm_password"
                           v-model="data.confirm_password"
                           data-vv-as="password"
                           v-validate="'required|confirmed:password'"
                           class="form-control"
                           placeholder="Confirm Password">

                    <span class="help-block">@{{ errors.first('confirm_password') }}</span>
                </div>

            </div>

            <div class="row">
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

            </div>

            <div class="form-group" :class="{'has-error' : errors.first('is_enable')}">
                <label class="control-label">
                    Status
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       name="is_enable"
                       v-model="data.is_enable"
                       data-vv-as="Status"
                       v-validate="'required'"
                >
                <br>
                <span class="help-block">@{{ errors.first('is_enable') }}</span>
            </div>

        </div>
    </div>
</div>


