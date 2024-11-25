<?php

namespace Modules\Setting\Http\Requests;

use Modules\Support\Locale;
use Modules\Support\Country;
use Modules\Support\TimeZone;
use Modules\Currency\Currency;
use Illuminate\Validation\Rule;
use Modules\Core\Http\Requests\Request;

class UpdateSettingRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'setting::attributes';

    /**
     * Array of attributes that should be merged with null
     * if attribute is not found in the current request.
     *
     * @var array
     */
    private $shouldCheck = ['sms_order_statuses', 'email_order_statuses'];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'supported_countries.*' => ['required', Rule::in(Country::codes())],
            'default_country' => 'required|in_array:supported_countries.*',
            'supported_locales.*' => ['required', Rule::in(Locale::codes())],
            'default_locale' => 'required|in_array:supported_locales.*',
            'default_timezone' => ['required', Rule::in(TimeZone::all())],
            'customer_role' => ['required', Rule::exists('roles', 'id')],
            'supported_currencies.*' => ['required', Rule::in(Currency::codes())],
            'default_currency' => 'required|in_array:supported_currencies.*',

            'translatable.store_name' => 'required',
            'store_phone' => ['required'],
            'store_email' => 'required|email',
            'store_country' => ['required', Rule::in(Country::codes())],

            'pwa_enabled' => 'required',
            'pwa_icon' => 'required_if:pwa_enabled,1',
            'pwa_theme_color' => ['regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'pwa_background_color' => ['regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'pwa_status_bar' => ['regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],

            'fixer_access_key' => 'required_if:currency_rate_exchange_service,fixer',
            'forge_api_key' => 'required_if:currency_rate_exchange_service,forge',
            'currency_data_feed_api_key' => 'required_if:currency_rate_exchange_service,currency_data_feed',
            'auto_refresh_currency_rates' => 'required|boolean',
            'auto_refresh_currency_rate_frequency' => [
                'required_if:auto_refresh_currency_rates,1', Rule::in($this->refreshFrequencies()),
            ],

            'sms_service' => ['nullable', Rule::in($this->smsServices())],
            'vonage_key' => ['required_if:sms_service,vonage'],
            'vonage_secret' => ['required_if:sms_service,vonage'],
            'twilio_sid' => ['required_if:sms_service,twilio'],
            'twilio_token' => ['required_if:sms_service,twilio'],
            'ippanel_api_key' => ['required_if:sms_service,ippanel'],
            'ippanel_new_order_admin_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'ippanel' && $this->new_order_admin_sms)],
            'ippanel_welcome_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'ippanel' && $this->welcome_sms)],
            'ippanel_new_order_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'ippanel' && $this->new_order_sms)],
            'ippanel_sms_order_statuses_pattern' => ['required_if:sms_service,ippanel'],
            'kavenegar_api_key' => ['required_if:sms_service,kavenegar'],
            'kavenegar_new_order_admin_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'kavenegar' && $this->new_order_admin_sms)],
            'kavenegar_welcome_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'kavenegar' && $this->welcome_sms)],
            'kavenegar_new_order_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'kavenegar' && $this->new_order_sms)],
            'kavenegar_sms_order_statuses_pattern' => ['required_if:sms_service,kavenegar'],
            'melipayamak_username' => ['required_if:sms_service,melipayamak'],
            'melipayamak_password' => ['required_if:sms_service,melipayamak'],
            'melipayamak_new_order_admin_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'melipayamak' && $this->new_order_admin_sms)],
            'melipayamak_welcome_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'melipayamak' && $this->welcome_sms)],
            'melipayamak_new_order_sms_pattern' => [Rule::requiredIf(fn () => $this->sms_service == 'melipayamak' && $this->new_order_sms)],
            'melipayamak_sms_order_statuses_pattern' => ['required_if:sms_service,melipayamak'],
            'sms_order_statuses.*' => ['nullable', Rule::in($this->orderStatuses())],

            'mail_from_address' => 'nullable|email',
            'mail_encryption' => ['nullable', Rule::in($this->mailEncryptionProtocols())],

            'newsletter_enabled' => ['required', 'boolean'],
            'mailchimp_api_key' => ['required_if:newsletter_enabled,1'],
            'mailchimp_list_id' => ['required_if:newsletter_enabled,1'],

            'google_recaptcha_enabled' => ['required', 'boolean'],
            'google_recaptcha_site_key' => ['required_if:google_recatcha_enabled,1'],
            'google_recaptcha_secret_key' => ['required_if:google_recaptcha_enabled,1'],

            'facebook_login_enabled' => 'required|boolean',
            'facebook_login_app_id' => 'required_if:facebook_login_enabled,1',
            'facebook_login_app_secret' => 'required_if:facebook_login_enabled,1',

            'google_login_enabled' => 'required|boolean',
            'google_login_client_id' => 'required_if:google_login_enabled,1',
            'google_login_client_secret' => 'required_if:google_login_enabled,1',

            'free_shipping_enabled' => 'required|boolean',
            'free_shipping_min_amount' => 'nullable|numeric',
            'translatable.free_shipping_label' => 'required_if:free_shipping_enabled,1',

            'local_pickup_enabled' => 'required|boolean',
            'translatable.local_pickup_label' => 'required_if:local_pickup_enabled,1',
            'local_pickup_cost' => ['required_if:local_pickup_enabled,1', 'nullable', 'numeric'],

            'flat_rate_enabled' => 'required|boolean',
            'translatable.flat_rate_label' => 'required_if:flat_rate_enabled,1',
            'flat_rate_cost' => ['required_if:flat_rate_enabled,1', 'nullable', 'numeric'],

            'payir_enabled' => 'required|boolean',
            'translatable.payir_gateway_label' => 'required_if:payir_enabled,1',
            'translatable.payir_gateway_description' => 'required_if:payir_enabled,1',
            'payir_merchantId' => 'required_if:payir_enabled,1',

            'zarinpal_enabled' => 'required|boolean',
            'translatable.zarinpal_gateway_label' => 'required_if:zarinpal_enabled,1',
            'translatable.zarinpal_gateway_description' => 'required_if:zarinpal_enabled,1',
            'zarinpal_merchantId' => 'required_if:zarinpal_enabled,1',

            'zibal_enabled' => 'required|boolean',
            'translatable.zibal_gateway_label' => 'required_if:zibal_enabled,1',
            'translatable.zibal_gateway_description' => 'required_if:zibal_enabled,1',
            'zibal_merchantId' => 'required_if:zibal_enabled,1',

            'sadad_enabled' => 'required|boolean',
            'translatable.sadad_gateway_label' => 'required_if:sadad_enabled,1',
            'translatable.sadad_gateway_description' => 'required_if:sadad_enabled,1',
            'sadad_key' => 'required_if:sadad_enabled,1',
            'sadad_merchantId' => 'required_if:sadad_enabled,1',
            'sadad_terminalId' => 'required_if:sadad_enabled,1',

            'saman_enabled' => 'required|boolean',
            'translatable.saman_gateway_label' => 'required_if:saman_enabled,1',
            'translatable.saman_gateway_description' => 'required_if:saman_enabled,1',
            'saman_merchantId' => 'required_if:saman_enabled,1',

            'sepehr_enabled' => 'required|boolean',
            'translatable.sepehr_gateway_label' => 'required_if:sepehr_enabled,1',
            'translatable.sepehr_gateway_description' => 'required_if:sepehr_enabled,1',
            'sepehr_terminalId' => 'required_if:sepehr_enabled,1',

            'idpay_enabled' => 'required|boolean',
            'translatable.idpay_gateway_label' => 'required_if:idpay_enabled,1',
            'translatable.idpay_gateway_description' => 'required_if:idpay_enabled,1',
            'idpay_merchantId' => 'required_if:idpay_enabled,1',

            'irankish_enabled' => 'required|boolean',
            'translatable.irankish_gateway_label' => 'required_if:irankish_enabled,1',
            'translatable.irankish_gateway_description' => 'required_if:irankish_enabled,1',
            'irankish_terminalId' => 'required_if:irankish_enabled,1',
            'irankish_password' => 'required_if:irankish_enabled,1',
            'irankish_acceptorId' => 'required_if:irankish_enabled,1',
            'irankish_pubKey' => 'required_if:irankish_enabled,1',

            'payping_enabled' => 'required|boolean',
            'translatable.payping_gateway_label' => 'required_if:payping_enabled,1',
            'translatable.payping_gateway_description' => 'required_if:payping_enabled,1',
            'payping_merchantId' => 'required_if:payping_enabled,1',

            'behpardakht_enabled' => 'required|boolean',
            'translatable.behpardakht_gateway_label' => 'required_if:behpardakht_enabled,1',
            'translatable.behpardakht_gateway_description' => 'required_if:behpardakht_enabled,1',
            'behpardakht_terminalId' => 'required_if:behpardakht_enabled,1',
            'behpardakht_username' => 'required_if:behpardakht_enabled,1',
            'behpardakht_password' => 'required_if:behpardakht_enabled,1',

            'paypal_enabled' => 'required|boolean',
            'translatable.paypal_label' => 'required_if:paypal_enabled,1',
            'translatable.paypal_description' => 'required_if:paypal_enabled,1',
            'paypal_test_mode' => 'required|boolean',
            'paypal_client_id' => 'required_if:paypal_enabled,1',
            'paypal_secret' => 'required_if:paypal_enabled,1',

            'stripe_enabled' => 'required|boolean',
            'translatable.stripe_label' => 'required_if:stripe_enabled,1',
            'translatable.stripe_description' => 'required_if:stripe_enabled,1',
            'stripe_publishable_key' => 'required_if:stripe_enabled,1',
            'stripe_secret_key' => 'required_if:stripe_enabled,1',

            'paytm_enabled' => 'required|boolean',
            'translatable.paytm_label' => 'required_if:paytm_enabled,1',
            'translatable.paytm_description' => 'required_if:paytm_enabled,1',
            'paytm_merchant_id' => 'required_if:paytm_enabled,1',
            'paytm_merchant_key' => 'required_if:paytm_enabled,1',

            'razorpay_enabled' => 'required|boolean',
            'translatable.razorpay_label' => 'required_if:razorpay_enabled,1',
            'translatable.razorpay_description' => 'required_if:razorpay_enabled,1',
            'razorpay_key_id' => 'required_if:razorpay_enabled,1',
            'razorpay_key_secret' => 'required_if:razorpay_enabled,1',

            'instamojo_enabled' => 'required|boolean',
            'translatable.instamojo_label' => 'required_if:instamojo_enabled,1',
            'translatable.instamojo_description' => 'required_if:instamojo_enabled,1',
            'instamojo_test_mode' => 'required|boolean',
            'instamojo_api_key' => 'required_if:instamojo_enabled,1',
            'instamojo_auth_token' => 'required_if:instamojo_enabled,1',

            'authorizenet_enabled' => 'required|boolean',
            'translatable.authorizenet_label' => 'required_if:authorizenet_enabled,1',
            'translatable.authorizenet_description' => 'required_if:authorizenet_enabled,1',
            'authorizenet_test_mode' => 'required|boolean',
            'authorizenet_merchant_login_id' => 'required_if:authorizenet_enabled,1',
            'authorizenet_merchant_transaction_key' => 'required_if:authorizenet_enabled,1',

            'paystack_enabled' => 'required|boolean',
            'translatable.paystack_label' => 'required_if:paystack_enabled,1',
            'translatable.paystack_description' => 'required_if:paystack_enabled,1',
            'paystack_test_mode' => 'required|boolean',
            'paystack_public_key' => 'required_if:paystack_enabled,1',
            'paystack_secret_key' => 'required_if:paystack_enabled,1',

            'mercadopago_enabled' => 'required|boolean',
            'translatable.mercadopago_label' => 'required_if:mercadopago_enabled,1',
            'translatable.mercadopago_description' => 'required_if:mercadopago_enabled,1',
            'mercadopago_test_mode' => 'required|boolean',
            'mercadopago_supported_currency' => 'required_if:mercadopago_enabled,1',
            'mercadopago_public_key' => 'required_if:mercadopago_enabled,1',
            'mercadopago_access_token' => 'required_if:mercadopago_enabled,1',

            'flutterwave_enabled' => 'required|boolean',
            'translatable.flutterwave_label' => 'required_if:flutterwave_enabled,1',
            'translatable.flutterwave_description' => 'required_if:flutterwave_enabled,1',
            'flutterwave_test_mode' => 'required|boolean',
            'flutterwave_public_key' => 'required_if:flutterwave_enabled,1',
            'flutterwave_secret_key' => 'required_if:flutterwave_enabled,1',
            'flutterwave_encryption_key' => 'required_if:flutterwave_enabled,1',

            'iyzico_enabled' => 'required|boolean',
            'translatable.iyzico_label' => 'required_if:iyzico_enabled,1',
            'translatable.iyzico_description' => 'required_if:iyzico_enabled,1',
            'iyzico_test_mode' => 'required|boolean',
            'iyzico_supported_currencies' => 'required_if:iyzico_enabled,1',
            'iyzico_api_key' => 'required_if:iyzico_enabled,1',
            'iyzico_api_secret' => 'required_if:iyzico_enabled,1',

            'payfast_enabled' => 'required|boolean',
            'translatable.payfast_label' => 'required_if:payfast_enabled,1',
            'translatable.payfast_description' => 'required_if:payfast_enabled,1',
            'payfast_test_mode' => 'required|boolean',
            'payfast_merchant_id' => 'required_if:payfast_enabled,1',
            'payfast_merchant_key' => 'required_if:payfast_enabled,1',
            'payfast_passphrase' => 'required_if:payfast_enabled,1',

            'cod_enabled' => 'required|boolean',
            'translatable.cod_label' => 'required_if:cod_enabled,1',
            'translatable.cod_description' => 'required_if:cod_enabled,1',

            'bank_transfer_enabled' => 'required|boolean',
            'translatable.bank_transfer_label' => 'required_if:bank_transfer_enabled,1',
            'translatable.bank_transfer_description' => 'required_if:bank_transfer_enabled,1',
            'translatable.bank_transfer_instructions' => 'required_if:bank_transfer_enabled,1',

            'check_payment_enabled' => 'required|boolean',
            'translatable.check_payment_label' => 'required_if:check_payment_enabled,1',
            'translatable.check_payment_description' => 'required_if:check_payment_enabled,1',
            'translatable.check_payment_instructions' => 'required_if:check_payment_enabled,1',
        ];
    }


    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        foreach ($this->shouldCheck as $attribute) {
            if (!$this->has($attribute)) {
                $this->merge([$attribute => null]);
            }
        }

        return $this->all();
    }


    /**
     * Returns currency rate refresh frequencies..
     *
     * @return array
     */
    private function refreshFrequencies()
    {
        return array_keys(trans('setting::settings.form.auto_refresh_currency_rate_frequencies'));
    }


    /**
     * Returns SMS services.
     *
     * @return array
     */
    private function smsServices()
    {
        return array_keys(trans('sms::services'));
    }


    /**
     * Returns order statuses.
     *
     * @return array
     */
    private function orderStatuses()
    {
        return array_keys(trans('order::statuses'));
    }


    /**
     * Returns mail encryption protocols.
     *
     * @return array
     */
    private function mailEncryptionProtocols()
    {
        return array_keys(trans('setting::settings.form.mail_encryption_protocols'));
    }
}