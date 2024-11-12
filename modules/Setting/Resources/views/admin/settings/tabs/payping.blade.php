<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('payping_enabled', trans('setting::attributes.payping_enabled'), trans('setting::settings.form.enable_payping'), $errors, $settings) }}
        {{ Form::text('translatable[payping_gateway_label]', trans('setting::attributes.translatable.payping_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[payping_gateway_description]', trans('setting::attributes.translatable.payping_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('payping_enabled', array_get($settings, 'payping_enabled')) ? '' : 'hide' }}" id="payping-fields">
            {{ Form::text('payping_merchantId', trans('setting::attributes.payping_merchantId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
