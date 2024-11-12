<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('irankish_enabled', trans('setting::attributes.irankish_enabled'), trans('setting::settings.form.enable_irankish'), $errors, $settings) }}
        {{ Form::text('translatable[irankish_gateway_label]', trans('setting::attributes.translatable.irankish_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[irankish_gateway_description]', trans('setting::attributes.translatable.irankish_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('irankish_enabled', array_get($settings, 'irankish_enabled')) ? '' : 'hide' }}" id="irankish-fields">
            {{ Form::text('irankish_terminalId', trans('setting::attributes.irankish_terminalId'), $errors, $settings, ['required' => true]) }}
            {{ Form::password('irankish_password', trans('setting::attributes.irankish_password'), $errors, $settings, ['required' => true]) }}
            {{ Form::text('irankish_acceptorId', trans('setting::attributes.irankish_acceptorId'), $errors, $settings, ['required' => true]) }}
            {{ Form::textarea('irankish_pubKey', trans('setting::attributes.irankish_pubKey'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
