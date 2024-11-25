<!DOCTYPE html>
<html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>نایس‌شاپ - نصب</title>

        <link rel="shortcut icon" href="{{ asset('build/assets/favicon.ico') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        @routes
        @vite(['resources/sass/install/main.scss', 'resources/sass/install/custom.scss', 'resources/js/install/main.js'])
    </head>

    <body class="rtl" dir="rtl">
        <div id="app" class="installer-wrapper">
            <Install v-cloak class="installer-box d-flex flex-column flex-md-row" :requirement-satisfied="{{ $requirement->satisfied() ? 'true' : 'false' }}" :permission-provided="{{ $permission->provided() ? 'true' : 'false' }}" inline-template>
                <div>
                    <aside class="installer-left-sidebar d-flex flex-column justify-content-between">
                        <div class="logo d-flex justify-content-center">
                            <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="48" cy="48" r="44" fill="#0068E1" />
                                <rect x="4" y="4" width="88" height="88" rx="44" fill="url(#paint0_linear_1371_8608)" fill-opacity="0.8" />
                                <path d="M43.8975 69.158H38.2055C33.973 69.158 31.8567 69.158 30.3017 68.3099C28.9356 67.5649 27.8592 66.3829 27.2449 64.9532C26.5457 63.3258 26.7432 61.2187 27.1383 57.0047L28.5277 42.1836C28.8613 38.6252 29.0282 36.8459 29.8284 35.5007C30.5332 34.316 31.5745 33.3678 32.8199 32.7766C34.2339 32.1054 36.0209 32.1054 39.595 32.1054L56.4028 32.1054C59.9769 32.1054 61.7639 32.1054 63.1779 32.7766C64.4232 33.3678 65.4646 34.316 66.1694 35.5007C66.9696 36.8459 67.1364 38.6252 67.47 42.1836L67.8278 46.0001M57.262 39.0528V32.1054C57.262 26.9895 53.1148 22.8422 47.9989 22.8422C42.883 22.8422 38.7357 26.9895 38.7357 32.1054V39.0528" stroke="white" stroke-width="4.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M68.2288 58.8527C69.1941 58.3329 69.6767 58.0731 69.8027 57.7563C69.912 57.4813 69.8849 57.1708 69.7295 56.9189C69.5506 56.6288 69.0302 56.4565 67.9895 56.1119L52.5873 51.0122C51.6759 50.7104 51.2202 50.5595 50.9167 50.668C50.6526 50.7624 50.4448 50.9703 50.3503 51.2344C50.2419 51.5379 50.3927 51.9936 50.6945 52.9049L55.7942 68.3072C56.1388 69.3479 56.3111 69.8683 56.6012 70.0473C56.8531 70.2026 57.1636 70.2297 57.4386 70.1204C57.7553 69.9944 58.0152 69.5118 58.535 68.5465L61.7148 62.6412C61.794 62.4941 61.8336 62.4206 61.8845 62.3562C61.9297 62.299 61.9814 62.2473 62.0385 62.2022C62.1029 62.1513 62.1764 62.1117 62.3235 62.0325L68.2288 58.8527Z" stroke="white" stroke-width="4.125" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M64.3485 81.5535C64.3523 81.9145 64.3747 82.2756 64.4233 82.6321C64.427 82.6458 64.427 82.6595 64.4308 82.6732C64.4682 82.92 64.5729 83.0982 64.7523 83.2216C64.8719 83.3039 64.9953 83.377 65.1336 83.4044C65.343 83.4501 65.5561 83.5004 65.7654 83.5507C65.8253 83.5644 65.8664 83.6101 65.8739 83.6741C65.8813 83.7335 65.8514 83.7929 65.7991 83.8249C65.7692 83.8386 65.7355 83.8477 65.7056 83.8615C65.5299 83.9163 65.3542 83.9803 65.1897 84.0808C64.9243 84.2408 64.7299 84.4876 64.6177 84.8212C64.4869 85.2051 64.3971 85.6027 64.3523 86.014C64.3411 86.1329 64.3261 86.2517 64.3149 86.3705C64.3074 86.4482 64.2738 86.4939 64.2214 86.4985C64.1691 86.5076 64.128 86.4756 64.1018 86.4071C64.0906 86.3751 64.0831 86.3431 64.0756 86.3111C63.9934 85.9775 63.8775 85.6621 63.7317 85.3605C63.698 85.2965 63.6644 85.2279 63.6233 85.1731C63.4363 84.9309 63.2345 84.7069 63.0027 84.5287C62.812 84.3825 62.6026 84.3002 62.3858 84.2408C62.2101 84.1951 62.0344 84.1539 61.8587 84.1128C61.7914 84.0991 61.754 84.0534 61.7503 83.9894C61.7465 83.9209 61.7839 83.866 61.8512 83.8477C61.8699 83.8432 61.8923 83.8386 61.9148 83.8386C62.0194 83.8523 62.1166 83.8158 62.2138 83.7975C62.412 83.7563 62.6026 83.6832 62.7933 83.6101C62.8905 83.5735 62.984 83.5278 63.0812 83.4867C63.3952 83.3496 63.5859 83.0708 63.7055 82.7052C63.7354 82.6092 63.7579 82.5087 63.7915 82.4173C63.8401 82.2802 63.8924 82.143 63.941 82.0059C63.9709 81.9282 64.0046 81.846 64.0233 81.7637C64.0681 81.5672 64.1093 81.3707 64.1541 81.1696C64.1616 81.1376 64.1728 81.1056 64.184 81.069C64.199 81.0233 64.2252 80.9959 64.2663 81.0005C64.3112 81.0051 64.3373 81.0416 64.3448 81.0919C64.3485 81.133 64.3485 81.1696 64.3485 81.2107C64.3485 81.325 64.3485 81.4392 64.3485 81.5535Z"
                                    fill="white" />
                                <path
                                    d="M29.1074 22.1517C29.1099 22.3323 29.1248 22.5128 29.1572 22.691C29.1597 22.6979 29.1597 22.7047 29.1622 22.7116C29.1871 22.835 29.2569 22.9241 29.3765 22.9858C29.4563 23.0269 29.5385 23.0635 29.6308 23.0772C29.7703 23.1001 29.9124 23.1252 30.052 23.1503C30.0918 23.1572 30.1193 23.18 30.1242 23.212C30.1292 23.2417 30.1093 23.2714 30.0744 23.2874C30.0545 23.2943 30.032 23.2989 30.0121 23.3057C29.8949 23.3331 29.7778 23.3651 29.6681 23.4154C29.4912 23.4954 29.3616 23.6188 29.2868 23.7856C29.1996 23.9775 29.1398 24.1764 29.1099 24.382C29.1024 24.4414 29.0924 24.5008 29.0849 24.5603C29.0799 24.5991 29.0575 24.622 29.0226 24.6242C28.9877 24.6288 28.9603 24.6128 28.9429 24.5785C28.9354 24.5625 28.9304 24.5465 28.9254 24.5305C28.8706 24.3637 28.7933 24.2061 28.6961 24.0552C28.6737 24.0233 28.6513 23.989 28.6238 23.9616C28.4992 23.8404 28.3646 23.7285 28.2101 23.6394C28.083 23.5662 27.9434 23.5251 27.7989 23.4954C27.6817 23.4725 27.5646 23.452 27.4474 23.4314C27.4026 23.4246 27.3777 23.4017 27.3752 23.3697C27.3727 23.3354 27.3976 23.308 27.4425 23.2989C27.4549 23.2966 27.4699 23.2943 27.4848 23.2943C27.5546 23.3012 27.6194 23.2829 27.6842 23.2737C27.8163 23.2532 27.9434 23.2166 28.0705 23.18C28.1353 23.1618 28.1976 23.1389 28.2625 23.1183C28.4718 23.0498 28.5989 22.9104 28.6787 22.7276C28.6986 22.6796 28.7136 22.6293 28.736 22.5836C28.7684 22.5151 28.8033 22.4465 28.8357 22.378C28.8556 22.3391 28.8781 22.298 28.8905 22.2569C28.9204 22.1586 28.9478 22.0603 28.9778 21.9598C28.9827 21.9438 28.9902 21.9278 28.9977 21.9095C29.0077 21.8867 29.0251 21.873 29.0525 21.8752C29.0824 21.8775 29.0999 21.8958 29.1049 21.9209C29.1074 21.9415 29.1074 21.9598 29.1074 21.9804C29.1074 22.0375 29.1074 22.0946 29.1074 22.1517Z"
                                    fill="white" />
                                <path
                                    d="M70.3574 29.0267C70.3599 29.2073 70.3748 29.3878 70.4072 29.566C70.4097 29.5729 70.4097 29.5797 70.4122 29.5866C70.4371 29.71 70.5069 29.7991 70.6265 29.8608C70.7063 29.9019 70.7885 29.9385 70.8808 29.9522C71.0203 29.9751 71.1624 30.0002 71.302 30.0253C71.3418 30.0322 71.3693 30.055 71.3742 30.087C71.3792 30.1167 71.3593 30.1464 71.3244 30.1624C71.3045 30.1693 71.282 30.1739 71.2621 30.1807C71.1449 30.2081 71.0278 30.2401 70.9181 30.2904C70.7412 30.3704 70.6116 30.4938 70.5368 30.6606C70.4496 30.8525 70.3898 31.0514 70.3599 31.257C70.3524 31.3164 70.3424 31.3758 70.3349 31.4353C70.3299 31.4741 70.3075 31.497 70.2726 31.4992C70.2377 31.5038 70.2103 31.4878 70.1929 31.4535C70.1854 31.4375 70.1804 31.4215 70.1754 31.4055C70.1206 31.2387 70.0433 31.0811 69.9461 30.9302C69.9237 30.8983 69.9013 30.864 69.8738 30.8366C69.7492 30.7154 69.6146 30.6035 69.4601 30.5144C69.333 30.4412 69.1934 30.4001 69.0489 30.3704C68.9317 30.3475 68.8146 30.327 68.6974 30.3064C68.6526 30.2996 68.6277 30.2767 68.6252 30.2447C68.6227 30.2104 68.6476 30.183 68.6925 30.1739C68.7049 30.1716 68.7199 30.1693 68.7348 30.1693C68.8046 30.1762 68.8694 30.1579 68.9342 30.1487C69.0663 30.1282 69.1934 30.0916 69.3205 30.055C69.3853 30.0368 69.4476 30.0139 69.5125 29.9933C69.7218 29.9248 69.8489 29.7854 69.9287 29.6026C69.9486 29.5546 69.9636 29.5043 69.986 29.4586C70.0184 29.3901 70.0533 29.3215 70.0857 29.253C70.1056 29.2141 70.1281 29.173 70.1405 29.1319C70.1704 29.0336 70.1978 28.9353 70.2278 28.8348C70.2327 28.8188 70.2402 28.8028 70.2477 28.7845C70.2577 28.7617 70.2751 28.748 70.3025 28.7502C70.3324 28.7525 70.3499 28.7708 70.3549 28.7959C70.3574 28.8165 70.3574 28.8348 70.3574 28.8554C70.3574 28.9125 70.3574 28.9696 70.3574 29.0267Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_1371_8608" x1="48" y1="4" x2="48" y2="92" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.4" />
                                        <stop offset="1" stop-color="white" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>

                        <ul class="step-list list-inline">
                            <li class="step-list-item d-flex position-relative" :class="{
                                'active': step === 1,
                                'complete': step >= 2
                            }">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <span :class="step > 1 ? 'mdi mdi-check' : 'circle rounded-circle'"></span>
                                </div>

                                <div>
                                    <label class="title">نیازمندی‌ها</label>
                                    <span class="excerpt d-block">بررسی نیازمندی‌های سیستم</span>
                                </div>
                            </li>

                            <li class="step-list-item d-flex position-relative" :class="{
                                'active': step === 2,
                                'complete': step >= 3
                            }">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <span :class="step > 2 ? 'mdi mdi-check' : 'circle rounded-circle'"></span>
                                </div>

                                <div>
                                    <label class="title">دسترسی‌ها</label>
                                    <span class="excerpt d-block">دریافت دسترسی‌های لازم</span>
                                </div>
                            </li>

                            <li class="step-list-item d-flex position-relative" :class="{
                                'active': step === 3 && !appInstalled,
                                'complete': appInstalled
                            }">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <span :class="appInstalled ? 'mdi mdi-check' : 'circle rounded-circle'"></span>
                                </div>

                                <div>
                                    <label class="title">پیکربندی</label>
                                    <span class="excerpt d-block">پیکربندی برنامه</span>
                                </div>
                            </li>

                            <li class="step-list-item d-flex position-relative" :class="{
                                'complete': appInstalled
                            }">
                                <div class="icon d-flex justify-content-center align-items-center rounded-circle">
                                    <span :class="appInstalled ? 'mdi mdi-check' : 'circle rounded-circle'"></span>
                                </div>

                                <div>
                                    <label class="title">تکمیل</label>
                                    <span class="excerpt d-block">نصب موفقیت‌آمیز</span>
                                </div>
                            </li>
                        </ul>

                        <span class="app-version">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 112.99">
                                <title>چند لایه</title>
                                <path d="M120.62,39.52,63.1,68.12a3.75,3.75,0,0,1-3.33,0L2.1,39.45a3.78,3.78,0,0,1-.18-6.67L59.59.48a3.78,3.78,0,0,1,3.73,0L121,32.78a3.77,3.77,0,0,1-.33,6.74Zm-9.77,40.93a3.76,3.76,0,0,1,3.6-6.61l6.41,3.38a3.77,3.77,0,0,1,1.58,5.09A3.82,3.82,0,0,1,120.7,84L63.1,112.6a3.75,3.75,0,0,1-3.33,0L2.1,83.93a3.77,3.77,0,0,1-1.71-5A3.69,3.69,0,0,1,2,77.22l6-3.14a3.76,3.76,0,0,1,4,6.35L61.44,105l49.41-24.57ZM111,57.69a3.76,3.76,0,0,1,4.36-6l5.49,2.89a3.76,3.76,0,0,1-.16,6.74L63.1,89.92a3.75,3.75,0,0,1-3.33,0L2.1,61.25a3.78,3.78,0,0,1-1.71-5A3.72,3.72,0,0,1,2,54.54L7.9,51.43A3.77,3.77,0,0,1,12,57.74l49.47,24.6L111,57.69ZM61.44,60.54,111,35.87,61.44,8.09,11.83,35.87,61.44,60.54Z"></path>
                            </svg>
                            {{ niceshop_version() }}
                        </span>
                    </aside>

                    <section class="installer-main-content flex-grow-1 overflow-hidden">
                        @yield('content')
                    </section>
                </div>
            </Install>
        </div>

        @stack('scripts')
    </body>

</html>