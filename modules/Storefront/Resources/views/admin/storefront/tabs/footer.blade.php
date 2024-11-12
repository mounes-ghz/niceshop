<div class="row">
    <div class="col-md-8">
        <div class="box-content clearfix">
        	{{ Form::select('storefront_footer_tags', trans('storefront::attributes.storefront_footer_tags'), $errors, $tags, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        	{{ Form::text('translatable[storefront_copyright_text]', trans('storefront::attributes.storefront_copyright_text'), $errors, $settings) }}
        	{{ Form::textarea('storefront_enamad_script', trans('storefront::attributes.storefront_enamad_script'), $errors, $settings, ['rows' => 3]) }}
        	{{ Form::textarea('storefront_samandehi_script', trans('storefront::attributes.storefront_samandehi_script'), $errors, $settings, ['rows' => 3]) }}
        </div>

        <div class="box-content clearfix">
        	@include('media::admin.image_picker.single', [
        	    'title' => trans('storefront::storefront.form.accepted_payment_methods_image'),
        	    'inputName' => 'storefront_accepted_payment_methods_image',
        	    'file' => $acceptedPaymentMethodsImage,
        	])
        </div>
    </div>
</div>
