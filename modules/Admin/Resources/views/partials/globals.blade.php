<script>
    window.NiceShop = {
        version: '{{ niceshop_version() }}',
        csrfToken: '{{ csrf_token() }}',
        baseUrl: '{{ url('/') }}',
        rtl: {{ is_rtl() ? 'true' : 'false' }},
        langs: {},
        data: {},
        errors: {},
        selectize: [],
        defaultCurrencySymbol: '{{ currency_symbol(setting("default_currency")) }}',
        lang: '{{ locale() }}'
    };

    NiceShop.langs['admin::admin.buttons.delete'] = '{{ trans('admin::admin.buttons.delete') }}';
    NiceShop.langs['media::media.file_manager.title'] = '{{ trans('media::media.file_manager.title') }}';
    NiceShop.langs['admin::admin.table.search_here'] = '{{ trans('admin::admin.table.search_here') }}';
    NiceShop.langs['admin::admin.table.showing_start_end_total_entries'] = '{{ trans('admin::admin.table.showing_start_end_total_entries') }}';
    NiceShop.langs['admin::admin.table.showing_empty_entries'] = '{{ trans('admin::admin.table.showing_empty_entries') }}';
    NiceShop.langs['admin::admin.table.show_menu_entries'] = '{{ trans('admin::admin.table.show_menu_entries') }}';
    NiceShop.langs['admin::admin.table.filtered_from_max_total_entries'] = '{{ trans('admin::admin.table.filtered_from_max_total_entries') }}';
    NiceShop.langs['admin::admin.table.no_data_available_table'] = '{{ trans('admin::admin.table.no_data_available_table') }}';
    NiceShop.langs['admin::admin.table.loading'] = '{{ trans('admin::admin.table.loading') }}';
    NiceShop.langs['admin::admin.table.processing'] = '{{ trans('admin::admin.table.processing') }}';
    NiceShop.langs['admin::admin.table.no_matching_records_found'] = '{{ trans('admin::admin.table.no_matching_records_found') }}';
</script>

@stack('globals')

@routes
