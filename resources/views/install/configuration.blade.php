<div class="has-scrollable-content configuration d-flex flex-column" v-else-if="step === 3 && !appInstalled" v-cloak>
    <div class="header overflow-hidden">
        <h3>پیکربندی</h3>
        <p class="excerpt">لطفا برنامه خود را با اطلاعات ضروری پیکربندی کنید.</p>
    </div>


    <div class="content position-relative flex-grow-1 overflow-hidden">
        <simplebar class="scrollable-content position-absolute" data-simplebar-auto-hide="false" ref="configurationContent">
            <div class="alert alert-danger alert-dismissible show fade" :class="{
                'animate__animated animate__headShake': animateAlert
            }" role="alert" v-if="hasErrorMessage">
                <span v-html="errorMessage"></span>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="resetErrorMessage">
                </button>
            </div>

            <form class="configuration-form form-horizontal" @input="errors.clear($event.target.name)" ref="configurationForm">
                <div class="box overflow-hidden">
                    <div class="title">
                        <h5>پایگاه داده</h5>
                    </div>

                    <div class="row form-group">
                        <label for="db_host" class="col-md-3 col-form-label">
                            میزبان <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="db_host" id="db_host" class="form-control ltr" v-model="form.db_host">

                            <span class="invalid-feedback" v-if="errors.has('db_host')">
                                @{{ errors.get('db_host') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="db_port" class="col-md-3 col-form-label">
                            پورت <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="db_port" id="db_port" class="form-control ltr" v-model="form.db_port">

                            <span class="invalid-feedback" v-if="errors.has('db_port')">
                                @{{ errors.get('db_port') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="db_username" class="col-md-3 col-form-label">
                            نام کاربری <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="db_username" id="db_username" class="form-control ltr" v-model="form.db_username">

                            <span class="invalid-feedback" v-if="errors.has('db_username')">
                                @{{ errors.get('db_username') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="db_password" class="col-md-3 col-form-label">
                            رمز عبور
                        </label>

                        <div class="col-md-9">
                            <input type="password" autocomplete="off" name="db_password" id="db_password" class="form-control ltr" v-model="form.db_password">

                            <span class="invalid-feedback" v-if="errors.has('db_password')">
                                @{{ errors.get('db_password') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="db_database" class="col-md-3 col-form-label">
                            پایگاه داده <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="db_database" id="db_database" class="form-control ltr" v-model="form.db_database">

                            <span class="invalid-feedback" v-if="errors.has('db_database')">
                                @{{ errors.get('db_database') }}
                            </span>
                        </div>
                    </div>
                </div>


                <div class="box overflow-hidden">
                    <div class="title">
                        <h5>مدیر</h5>
                    </div>

                    <div class="row form-group">
                        <label for="admin_first_name" class="col-md-3 col-form-label">
                            نام <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="admin_first_name" id="admin_first_name" class="form-control" v-model="form.admin_first_name">

                            <span class="invalid-feedback" v-if="errors.has('admin_first_name')">
                                @{{ errors.get('admin_first_name') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="admin_last_name" class="col-md-3 col-form-label">
                            نام خانوادگی <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="admin_last_name" id="admin_last_name" class="form-control" v-model="form.admin_last_name">

                            <span class="invalid-feedback" v-if="errors.has('admin_last_name')">
                                @{{ errors.get('admin_last_name') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="admin_email" class="col-md-3 col-form-label">
                            ایمیل <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="email" autocomplete="off" name="admin_email" id="admin_email" class="form-control" v-model="form.admin_email">

                            <span class="invalid-feedback" v-if="errors.has('admin_email')">
                                @{{ errors.get('admin_email') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="admin_phone" class="col-md-3 col-form-label">
                            تلفن <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="admin_phone" id="admin_phone" class="form-control ltr" v-model="form.admin_phone">

                            <span class="invalid-feedback" v-if="errors.has('admin_phone')">
                                @{{ errors.get('admin_phone') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="admin_password" class="col-md-3 col-form-label">
                            رمز عبور <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="password" autocomplete="off" name="admin_password" id="admin_password" class="form-control ltr" v-model="form.admin_password">

                            <span class="invalid-feedback" v-if="errors.has('admin_password')">
                                @{{ errors.get('admin_password') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="admin_password_confirmation" class="col-md-3 col-form-label">
                            تایید رمز عبور <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="password" autocomplete="off" name="admin_password_confirmation" id="admin_password_confirmation" class="form-control ltr" v-model="form.admin_password_confirmation">

                            <span class="invalid-feedback" v-if="errors.has('admin_password_confirmation')">
                                @{{ errors.get('admin_password_confirmation') }}
                            </span>
                        </div>
                    </div>
                </div>


                <div class="box overflow-hidden">
                    <div class="title">
                        <h5>فروشگاه</h5>
                    </div>

                    <div class="row form-group">
                        <label for="store_name" class="col-md-3 col-form-label">
                            نام <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="store_name" id="store_name" class="form-control" v-model="form.store_name">

                            <span class="invalid-feedback" v-if="errors.has('store_name')">
                                @{{ errors.get('store_name') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="store_email" class="col-md-3 col-form-label">
                            ایمیل <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="email" autocomplete="off" name="store_email" id="store_email" class="form-control  ltr" v-model="form.store_email">

                            <span class="invalid-feedback" v-if="errors.has('store_email')">
                                @{{ errors.get('store_email') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="store_phone" class="col-md-3 col-form-label">
                            تلفن <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" autocomplete="off" name="store_phone" id="store_phone" class="form-control  ltr" v-model="form.store_phone">

                            <span class="invalid-feedback" v-if="errors.has('store_phone')">
                                @{{ errors.get('store_phone') }}
                            </span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="store_search_engine" class="col-md-3 col-form-label">
                            موتور جستجو <span class="required">*</span>
                        </label>

                        <div class="col-md-9">
                            <select name="store_search_engine" id="store_search_engine" class="form-select" @change="scrollToBottom($event.target.value)" v-model="form.store_search_engine">
                                <option value="mysql">MySQL</option>
                                <option value="algolia">Algolia</option>
                                <option value="meilisearch">Meilisearch</option>
                            </select>

                            <span class="invalid-feedback" v-if="errors.has('store_search_engine')">
                                @{{ errors.get('store_search_engine') }}
                            </span>

                            <span class="text-muted" v-else>شما نمی‌توانید بعداً موتور جستجو را تغییر دهید.</span>
                        </div>
                    </div>

                    <template v-if="form.store_search_engine === 'algolia'">
                        <div class="row form-group">
                            <label for="algolia_app_id" class="col-md-3 col-form-label">
                                شناسه برنامه Algolia <span class="required">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text" autocomplete="off" name="algolia_app_id" id="algolia_app_id" class="form-control  ltr" v-model="form.algolia_app_id">

                                <span class="invalid-feedback" v-if="errors.has('algolia_app_id')">
                                    @{{ errors.get('algolia_app_id') }}
                                </span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="algolia_secret" class="col-md-3 col-form-label">
                                کلید مدیریت Algolia <span class="required">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="password" autocomplete="off" name="algolia_secret" id="algolia_secret" class="form-control ltr" v-model="form.algolia_secret">

                                <span class="invalid-feedback" v-if="errors.has('algolia_secret')">
                                    @{{ errors.get('algolia_secret') }}
                                </span>
                            </div>
                        </div>
                    </template>

                    <template v-if="form.store_search_engine === 'meilisearch'">
                        <div class="row form-group">
                            <label for="meilisearch_host" class="col-md-3 col-form-label">
                                هاست Meilisearch <span class="required">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text" autocomplete="off" name="meilisearch_host" id="meilisearch_host" class="form-control ltr" v-model="form.meilisearch_host">

                                <span class="invalid-feedback" v-if="errors.has('meilisearch_host')">
                                    @{{ errors.get('meilisearch_host') }}
                                </span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="meilisearch_key" class="col-md-3 col-form-label">
                                کلید Meilisearch <span class="required">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="password" autocomplete="off" name="meilisearch_key" id="meilisearch_key" class="form-control ltr" v-model="form.meilisearch_key">

                                <span class="invalid-feedback" v-if="errors.has('meilisearch_key')">
                                    @{{ errors.get('meilisearch_key') }}
                                </span>
                            </div>
                        </div>
                    </template>
                </div>

            </form>
        </simplebar>
    </div>
</div>
