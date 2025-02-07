@section('content')
    <div class="row">
        <div class="btn-group pull-right">
            @if (isset($buttons, $name))
                @foreach ($buttons as $view)
                    @if ($view === 'upload_excel')
                        <button type="button" class="btn btn-primary btn-actions btn-upload-excel" data-toggle="modal" data-target="#uploadExcelModal">
                            {{ trans('product::products.upload_excel') }}
                        </button>

                    @elseif ($view === 'update_products')
                        <button type="button" class="btn btn-warning btn-actions btn-update-excel" data-toggle="modal" data-target="#updateExcelModal">
                         بروز رسانی
                        </button>
                    @elseif ($view === 'selected_products')
                        <button type="button" class="btn btn-success btn-actions" id="export-selected">
                           ویرایش گروهی
                        </button>

                    @else
                        <a href="{{ route("admin.{$resource}.{$view}") }}" class="btn btn-primary btn-actions btn-{{ $view }}">
                            {{ trans("admin::resource.{$view}", ['resource' => $name]) }}
                        </a>
                    @endif
                @endforeach


            @else
                {{ $buttons ?? '' }}
            @endif
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-body index-table" id="{{ isset($resource) ? "{$resource}-table" : '' }}">
            @if (isset($thead))
                @include('admin::components.table')
            @else
                {{ $slot }}
            @endif
        </div>
    </div>
@endsection

@isset($name)
    @push('shortcuts')
        @if (isset($buttons) && in_array('create', $buttons))
            <dl class="dl-horizontal">
                <dt><code>c</code></dt>
                <dd>{{ trans('admin::resource.create', ['resource' => $name]) }}</dd>
            </dl>
        @endif

        <dl class="dl-horizontal">
            <dt><code>Del</code></dt>
            <dd>{{ trans('admin::resource.delete', ['resource' => $name]) }}</dd>
        </dl>
    @endpush

    @push('scripts')
        <script type="module">
            document.addEventListener("DOMContentLoaded", function () {
                let exportButton = document.getElementById('export-selected');

                if (exportButton !== null) {
                    exportButton.addEventListener('click', function (event) {
                        event.preventDefault();
                        let selectedProducts = [];

                        document.querySelectorAll('input[type="checkbox"]:checked').forEach((checkbox) => {
                            if (checkbox.value) {
                                selectedProducts.push(checkbox.value);
                            }
                        });

                        if (selectedProducts.length === 0) {
                            alert('لطفا حداقل یک محصول را انتخاب کنید.');
                            return;
                        }

                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = "{{ route('admin.products.export_selected') }}";
                        form.style.display = 'none';

                        let csrfInput = document.createElement('input');
                        csrfInput.name = '_token';
                        csrfInput.value = '{{ csrf_token() }}';
                        form.appendChild(csrfInput);

                        let input = document.createElement('input');
                        input.name = 'selected_products';
                        input.value = selectedProducts.join(',');
                        form.appendChild(input);

                        document.body.appendChild(form);
                        form.submit();
                    });
                }
            });

            @if (isset($buttons) && in_array('create', $buttons))
                keypressAction([
                    { key: 'c', route: '{{ route("admin.{$resource}.create") }}'}
                ]);
            @endif

            Mousetrap.bind('del', function () {
                $('.btn-delete').trigger('click');
            });

            Mousetrap.bind('backspace', function () {
                $('.btn-delete').trigger('click');
            });

            @isset($resource)
                DataTable.setRoutes('#{{ $resource }}-table .table', {
                    table: '{{ "admin.{$resource}.table" }}',
                    edit: '{{ "admin.{$resource}.edit" }}',
                    destroy: '{{ "admin.{$resource}.destroy" }}',
                });
            @endisset
        </script>
    @endpush
@endisset
