<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('saman_enabled', trans('setting::attributes.saman_enabled'), trans('setting::settings.form.enable_saman'), $errors, $settings) }}
        {{ Form::text('translatable[saman_gateway_label]', trans('setting::attributes.translatable.saman_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[saman_gateway_description]', trans('setting::attributes.translatable.saman_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('saman_enabled', array_get($settings, 'saman_enabled')) ? '' : 'hide' }}" id="saman-fields">
            {{ Form::text('saman_merchantId', trans('setting::attributes.saman_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
