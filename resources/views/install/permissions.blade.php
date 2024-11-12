<div class="has-scrollable-content permissions d-flex flex-column" v-else-if="step === 2" v-cloak>
    <div class="header overflow-hidden">
        <h3>دسترسی‌ها</h3>
        <p class="excerpt">لطفا مطمئن شوید که PHP به فایل‌ها و پوشه‌های زیر دسترسی مناسب دارد.</p>
    </div>

    <div class="content position-relative flex-grow-1 overflow-hidden">
        <simplebar class="scrollable-content position-absolute" data-simplebar-auto-hide="false">
            <div class="box">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>فایل‌ها</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($permission->files() as $label => $satisfied)
                                <tr>
                                    <td>{{ $label }}</td>

                                    <td>
                                        <span class="mdi mdi-{{ $satisfied ? 'checkbox-marked-circle' : 'close-circle' }}"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>پوشه‌ها</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($permission->directories() as $label => $satisfied)
                                <tr>
                                    <td>{{ $label }}</td>

                                    <td>
                                        <span class="mdi mdi-{{ $satisfied ? 'checkbox-marked-circle' : 'close-circle' }}"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </simplebar>
    </div>
</div>
