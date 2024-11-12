<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('sepehr_enabled', trans('setting::attributes.sepehr_enabled'), trans('setting::settings.form.enable_sepehr'), $errors, $settings) }}
        {{ Form::text('translatable[sepehr_gateway_label]', trans('setting::attributes.translatable.sepehr_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[sepehr_gateway_description]', trans('setting::attributes.translatable.sepehr_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('sepehr_enabled', array_get($settings, 'sepehr_enabled')) ? '' : 'hide' }}" id="sepehr-fields">
            {{ Form::text('sepehr_terminalId', trans('setting::attributes.sepehr_terminalId'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
