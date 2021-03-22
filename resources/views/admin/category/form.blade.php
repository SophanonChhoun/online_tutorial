<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>User</div>
        </div>
        <div class="portlet-body">
            <div class="row">

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
