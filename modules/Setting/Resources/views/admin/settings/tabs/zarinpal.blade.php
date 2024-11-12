<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('zarinpal_enabled', trans('setting::attributes.zarinpal_enabled'), trans('setting::settings.form.enable_zarinpal'), $errors, $settings) }}
        {{ Form::text('translatable[zarinpal_gateway_label]', trans('setting::attributes.translatable.zarinpal_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[zarinpal_gateway_description]', trans('setting::attributes.translatable.zarinpal_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('zarinpal_enabled', array_get($settings, 'zarinpal_enabled')) ? '' : 'hide' }}" id="zarinpal-fields">
            {{ Form::text('zarinpal_merchantId', trans('setting::attributes.zarinpal_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
