<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('zibal_enabled', trans('setting::attributes.zibal_enabled'), trans('setting::settings.form.enable_zibal'), $errors, $settings) }}
        {{ Form::text('translatable[zibal_gateway_label]', trans('setting::attributes.translatable.zibal_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[zibal_gateway_description]', trans('setting::attributes.translatable.zibal_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('zibal_enabled', array_get($settings, 'zibal_enabled')) ? '' : 'hide' }}" id="zibal-fields">
            {{ Form::text('zibal_merchantId', trans('setting::attributes.zibal_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
