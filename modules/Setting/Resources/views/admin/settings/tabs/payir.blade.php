<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('payir_enabled', trans('setting::attributes.payir_enabled'), trans('setting::settings.form.enable_payir'), $errors, $settings) }}
        {{ Form::text('translatable[payir_gateway_label]', trans('setting::attributes.translatable.payir_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[payir_gateway_description]', trans('setting::attributes.translatable.payir_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('payir_enabled', array_get($settings, 'payir_enabled')) ? '' : 'hide' }}" id="payir-fields">
            {{ Form::text('payir_merchantId', trans('setting::attributes.payir_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
