<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('sadad_enabled', trans('setting::attributes.sadad_enabled'), trans('setting::settings.form.enable_sadad'), $errors, $settings) }}
        {{ Form::text('translatable[sadad_gateway_label]', trans('setting::attributes.translatable.sadad_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[sadad_gateway_description]', trans('setting::attributes.translatable.sadad_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('sadad_enabled', array_get($settings, 'sadad_enabled')) ? '' : 'hide' }}" id="sadad-fields">
            {{ Form::text('sadad_key', trans('setting::attributes.sadad_key'), $errors, $settings, ['required' => true]) }}
            {{ Form::text('sadad_merchantId', trans('setting::attributes.sadad_merchantId'), $errors, $settings, ['required' => true]) }}
            {{ Form::text('sadad_terminalId', trans('setting::attributes.sadad_terminalId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
