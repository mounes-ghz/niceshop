<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('idpay_enabled', trans('setting::attributes.idpay_enabled'), trans('setting::settings.form.enable_idpay'), $errors, $settings) }}
        {{ Form::text('translatable[idpay_gateway_label]', trans('setting::attributes.translatable.idpay_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[idpay_gateway_description]', trans('setting::attributes.translatable.idpay_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('idpay_enabled', array_get($settings, 'idpay_enabled')) ? '' : 'hide' }}" id="idpay-fields">
            {{ Form::text('idpay_merchantId', trans('setting::attributes.idpay_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
