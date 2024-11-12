<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('behpardakht_enabled', trans('setting::attributes.behpardakht_enabled'), trans('setting::settings.form.enable_behpardakht'), $errors, $settings) }}
        {{ Form::text('translatable[behpardakht_gateway_label]', trans('setting::attributes.translatable.behpardakht_gateway_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('translatable[behpardakht_gateway_description]', trans('setting::attributes.translatable.behpardakht_gateway_description'), $errors, $settings, ['rows' => 3, 'required' => true]) }}

        <div class="{{ old('behpardakht_enabled', array_get($settings, 'behpardakht_enabled')) ? '' : 'hide' }}" id="behpardakht-fields">
            {{ Form::text('behpardakht_terminalId', trans('setting::attributes.behpardakht_terminalId'), $errors, $settings, ['required' => true]) }}
            {{ Form::text('behpardakht_username', trans('setting::attributes.behpardakht_username'), $errors, $settings, ['required' => true]) }}
            {{ Form::password('behpardakht_password', trans('setting::attributes.behpardakht_password'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>
