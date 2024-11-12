<div class="has-scrollable-content requirements d-flex flex-column" v-if="step === 1" v-cloak>
    <div class="header overflow-hidden">
        <h3>پیش‌ نیازها</h3>
        <p class="excerpt">مطمئن شوید که نسخه مناسب PHP نصب شده و افزونه‌های مورد نیاز PHP نیز هم نصب شده و هم فعال هستند.</p>
    </div>

    <div class="content position-relative flex-grow-1 overflow-hidden">
        <simplebar class="scrollable-content position-absolute" data-simplebar-auto-hide="false">
            <div class="box" v-cloak>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>PHP</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requirement->php() as $label => $satisfied)
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

            <div class="box" v-cloak>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>افزونه‌ها</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($requirement->extensions() as $label => $satisfied)
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
