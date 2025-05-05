
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ url('assets/img/madrid.png') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ url('assets/img/madrid.png') }}" />
    <!-- Font -->
    <link rel="stylesheet" href="{{ url('/myhr/fonts/fonts.css') }}" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('/myhr/fonts/icons-alipay.css') }}">
    <link rel="stylesheet" href="{{ url('/myhr/styles/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/myhr/styles/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/myhr/styles/styles.css') }}" />
    <link rel="manifest" href="{{ url('/myhr/_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ url('assets/img/madrid.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="{{ url('clock/dist/bootstrap-clockpicker.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 45px;
            line-height: 45px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 45px;
        }

        .select2-results__option {
            line-height: 45px;
        }

        .select2-selection__choice {
            line-height: 45px;
        }

        input[type="text"], input[type="number"], input[type="datetime"], input[type="file"], input[type="email"], select, textarea {
            border: 1px solid #9e9e9e;
        }


    </style>
    @stack('style')
</head>

<body>
     <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>

    @if (Request::is('dashboard*'))
        <div class="app-header">
            <div class="tf-container">
                <div class="tf-topbar d-flex justify-content-between align-items-center">
                    <a class="user-info d-flex justify-content-between align-items-center" href="{{ url('/my-profile') }}">
                        @if(auth()->user()->foto == null)
                            <img src="{{ url('assets/img/foto_default.jpg') }}" alt="image">
                        @else
                            <img src="{{ url('/storage/'.auth()->user()->foto) }}" alt="image">
                        @endif

                        <div class="content">
                            <h4 class="white_color">{{ auth()->user()->name }}</h4>
                            <p class="white_color fw_4">{{ auth()->user()->email }}</p>
                        </div>
                    </a>
                    <div class="d-flex align-items-center gap-4">
                        <a href="javascript:void(0);" id="btn-popup-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M7.25687 5.89462C8.06884 5.35208 9.02346 5.0625 10 5.0625C11.3095 5.0625 12.5654 5.5827 13.4913 6.50866C14.4173 7.43462 14.9375 8.6905 14.9375 10C14.9375 10.9765 14.6479 11.9312 14.1054 12.7431C13.5628 13.5551 12.7917 14.188 11.8895 14.5617C10.9873 14.9354 9.99452 15.0331 9.03674 14.8426C8.07896 14.6521 7.19918 14.1819 6.50866 13.4913C5.81814 12.8008 5.34789 11.921 5.15737 10.9633C4.96686 10.0055 5.06464 9.01271 5.43835 8.1105C5.81205 7.20829 6.44491 6.43716 7.25687 5.89462ZM8.29857 12.5464C8.80219 12.8829 9.3943 13.0625 10 13.0625C10.8122 13.0625 11.5912 12.7398 12.1655 12.1655C12.7398 11.5912 13.0625 10.8122 13.0625 10C13.0625 9.3943 12.8829 8.80219 12.5464 8.29857C12.2099 7.79494 11.7316 7.40241 11.172 7.17062C10.6124 6.93883 9.99661 6.87818 9.40254 6.99635C8.80847 7.11451 8.26279 7.40619 7.83449 7.83449C7.40619 8.26279 7.11451 8.80847 6.99635 9.40254C6.87818 9.99661 6.93883 10.6124 7.17062 11.172C7.40241 11.7316 7.79494 12.2099 8.29857 12.5464ZM24.7431 14.1054C23.9312 14.6479 22.9765 14.9375 22 14.9375C20.6905 14.9375 19.4346 14.4173 18.5087 13.4913C17.5827 12.5654 17.0625 11.3095 17.0625 10C17.0625 9.02346 17.3521 8.06884 17.8946 7.25687C18.4372 6.44491 19.2083 5.81205 20.1105 5.43835C21.0127 5.06464 22.0055 4.96686 22.9633 5.15737C23.921 5.34789 24.8008 5.81814 25.4913 6.50866C26.1819 7.19918 26.6521 8.07896 26.8426 9.03674C27.0331 9.99452 26.9354 10.9873 26.5617 11.8895C26.1879 12.7917 25.5551 13.5628 24.7431 14.1054ZM23.7014 7.45363C23.1978 7.11712 22.6057 6.9375 22 6.9375C21.1878 6.9375 20.4088 7.26016 19.8345 7.83449C19.2602 8.40882 18.9375 9.18778 18.9375 10C18.9375 10.6057 19.1171 11.1978 19.4536 11.7014C19.7901 12.2051 20.2684 12.5976 20.828 12.8294C21.3876 13.0612 22.0034 13.1218 22.5975 13.0037C23.1915 12.8855 23.7372 12.5938 24.1655 12.1655C24.5938 11.7372 24.8855 11.1915 25.0037 10.5975C25.1218 10.0034 25.0612 9.38763 24.8294 8.82803C24.5976 8.26844 24.2051 7.79014 23.7014 7.45363ZM7.25687 17.8946C8.06884 17.3521 9.02346 17.0625 10 17.0625C11.3095 17.0625 12.5654 17.5827 13.4913 18.5087C14.4173 19.4346 14.9375 20.6905 14.9375 22C14.9375 22.9765 14.6479 23.9312 14.1054 24.7431C13.5628 25.5551 12.7917 26.1879 11.8895 26.5617C10.9873 26.9354 9.99452 27.0331 9.03674 26.8426C8.07896 26.6521 7.19918 26.1819 6.50866 25.4913C5.81814 24.8008 5.34789 23.921 5.15737 22.9633C4.96686 22.0055 5.06464 21.0127 5.43835 20.1105C5.81205 19.2083 6.44491 18.4372 7.25687 17.8946ZM8.29857 24.5464C8.80219 24.8829 9.3943 25.0625 10 25.0625C10.8122 25.0625 11.5912 24.7398 12.1655 24.1655C12.7398 23.5912 13.0625 22.8122 13.0625 22C13.0625 21.3943 12.8829 20.8022 12.5464 20.2986C12.2099 19.7949 11.7316 19.4024 11.172 19.1706C10.6124 18.9388 9.99661 18.8782 9.40254 18.9963C8.80847 19.1145 8.26279 19.4062 7.83449 19.8345C7.40619 20.2628 7.11451 20.8085 6.99635 21.4025C6.87818 21.9966 6.93883 22.6124 7.17062 23.172C7.40241 23.7316 7.79494 24.2099 8.29857 24.5464ZM19.2569 17.8946C20.0688 17.3521 21.0235 17.0625 22 17.0625C23.3095 17.0625 24.5654 17.5827 25.4913 18.5087C26.4173 19.4346 26.9375 20.6905 26.9375 22C26.9375 22.9765 26.6479 23.9312 26.1054 24.7431C25.5628 25.5551 24.7917 26.1879 23.8895 26.5617C22.9873 26.9354 21.9945 27.0331 21.0367 26.8426C20.079 26.6521 19.1992 26.1819 18.5087 25.4913C17.8181 24.8008 17.3479 23.921 17.1574 22.9633C16.9669 22.0055 17.0646 21.0127 17.4383 20.1105C17.8121 19.2083 18.4449 18.4372 19.2569 17.8946ZM20.2986 24.5464C20.8022 24.8829 21.3943 25.0625 22 25.0625C22.8122 25.0625 23.5912 24.7398 24.1655 24.1655C24.7398 23.5912 25.0625 22.8122 25.0625 22C25.0625 21.3943 24.8829 20.8022 24.5464 20.2986C24.2099 19.7949 23.7316 19.4024 23.172 19.1706C22.6124 18.9388 21.9966 18.8782 21.4025 18.9963C20.8085 19.1145 20.2628 19.4062 19.8345 19.8345C19.4062 20.2628 19.1145 20.8085 18.9963 21.4025C18.8782 21.9966 18.9388 22.6124 19.1706 23.172C19.4024 23.7316 19.7949 24.2099 20.2986 24.5464Z" fill="white" stroke="white" stroke-width="0.125"/>
                            </svg>
                        </a>
                        <a href="{{ url('/notifications') }}" class="icon-notification1">
                            @if (auth()->user()->notifications()->whereNull('read_at')->count() > 0)
                                <span>{{ auth()->user()->notifications()->whereNull('read_at')->count() }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="header is-fixed">
            <div class="tf-container">
                <div class="tf-statusbar d-flex justify-content-between align-items-center position-relative" style="height: 50px;">

                    <div class="flex-item start" style="width: 50px; margin-top: -50px">
                        <a href="{{ url('/dashboard-user') }}" class="back-btn d-inline-block">
                            @yield('back')
                        </a>
                    </div>

                    <div class="flex-item center text-center flex-grow-1">
                        <h3 class="m-0">{{ $title }}</h3>
                    </div>

                    @if (auth()->user())
                        <div class="flex-item end text-end" style="width: 50px;">
                            <a href="javascript:void(0);" id="btn-popup-left" class="d-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path d="M7.25687 5.89462C8.06884 5.35208 9.02346 5.0625 10 5.0625C11.3095 5.0625 12.5654 5.5827 13.4913 6.50866C14.4173 7.43462 14.9375 8.6905 14.9375 10C14.9375 10.9765 14.6479 11.9312 14.1054 12.7431C13.5628 13.5551 12.7917 14.188 11.8895 14.5617C10.9873 14.9354 9.99452 15.0331 9.03674 14.8426C8.07896 14.6521 7.19918 14.1819 6.50866 13.4913C5.81814 12.8008 5.34789 11.921 5.15737 10.9633C4.96686 10.0055 5.06464 9.01271 5.43835 8.1105C5.81205 7.20829 6.44491 6.43716 7.25687 5.89462ZM8.29857 12.5464C8.80219 12.8829 9.3943 13.0625 10 13.0625C10.8122 13.0625 11.5912 12.7398 12.1655 12.1655C12.7398 11.5912 13.0625 10.8122 13.0625 10C13.0625 9.3943 12.8829 8.80219 12.5464 8.29857C12.2099 7.79494 11.7316 7.40241 11.172 7.17062C10.6124 6.93883 9.99661 6.87818 9.40254 6.99635C8.80847 7.11451 8.26279 7.40619 7.83449 7.83449C7.40619 8.26279 7.11451 8.80847 6.99635 9.40254C6.87818 9.99661 6.93883 10.6124 7.17062 11.172C7.40241 11.7316 7.79494 12.2099 8.29857 12.5464ZM24.7431 14.1054C23.9312 14.6479 22.9765 14.9375 22 14.9375C20.6905 14.9375 19.4346 14.4173 18.5087 13.4913C17.5827 12.5654 17.0625 11.3095 17.0625 10C17.0625 9.02346 17.3521 8.06884 17.8946 7.25687C18.4372 6.44491 19.2083 5.81205 20.1105 5.43835C21.0127 5.06464 22.0055 4.96686 22.9633 5.15737C23.921 5.34789 24.8008 5.81814 25.4913 6.50866C26.1819 7.19918 26.6521 8.07896 26.8426 9.03674C27.0331 9.99452 26.9354 10.9873 26.5617 11.8895C26.1879 12.7917 25.5551 13.5628 24.7431 14.1054ZM23.7014 7.45363C23.1978 7.11712 22.6057 6.9375 22 6.9375C21.1878 6.9375 20.4088 7.26016 19.8345 7.83449C19.2602 8.40882 18.9375 9.18778 18.9375 10C18.9375 10.6057 19.1171 11.1978 19.4536 11.7014C19.7901 12.2051 20.2684 12.5976 20.828 12.8294C21.3876 13.0612 22.0034 13.1218 22.5975 13.0037C23.1915 12.8855 23.7372 12.5938 24.1655 12.1655C24.5938 11.7372 24.8855 11.1915 25.0037 10.5975C25.1218 10.0034 25.0612 9.38763 24.8294 8.82803C24.5976 8.26844 24.2051 7.79014 23.7014 7.45363ZM7.25687 17.8946C8.06884 17.3521 9.02346 17.0625 10 17.0625C11.3095 17.0625 12.5654 17.5827 13.4913 18.5087C14.4173 19.4346 14.9375 20.6905 14.9375 22C14.9375 22.9765 14.6479 23.9312 14.1054 24.7431C13.5628 25.5551 12.7917 26.1879 11.8895 26.5617C10.9873 26.9354 9.99452 27.0331 9.03674 26.8426C8.07896 26.6521 7.19918 26.1819 6.50866 25.4913C5.81814 24.8008 5.34789 23.921 5.15737 22.9633C4.96686 22.0055 5.06464 21.0127 5.43835 20.1105C5.81205 19.2083 6.44491 18.4372 7.25687 17.8946ZM8.29857 24.5464C8.80219 24.8829 9.3943 25.0625 10 25.0625C10.8122 25.0625 11.5912 24.7398 12.1655 24.1655C12.7398 23.5912 13.0625 22.8122 13.0625 22C13.0625 21.3943 12.8829 20.8022 12.5464 20.2986C12.2099 19.7949 11.7316 19.4024 11.172 19.1706C10.6124 18.9388 9.99661 18.8782 9.40254 18.9963C8.80847 19.1145 8.26279 19.4062 7.83449 19.8345C7.40619 20.2628 7.11451 20.8085 6.99635 21.4025C6.87818 21.9966 6.93883 22.6124 7.17062 23.172C7.40241 23.7316 7.79494 24.2099 8.29857 24.5464ZM19.2569 17.8946C20.0688 17.3521 21.0235 17.0625 22 17.0625C23.3095 17.0625 24.5654 17.5827 25.4913 18.5087C26.4173 19.4346 26.9375 20.6905 26.9375 22C26.9375 22.9765 26.6479 23.9312 26.1054 24.7431C25.5628 25.5551 24.7917 26.1879 23.8895 26.5617C22.9873 26.9354 21.9945 27.0331 21.0367 26.8426C20.079 26.6521 19.1992 26.1819 18.5087 25.4913C17.8181 24.8008 17.3479 23.921 17.1574 22.9633C16.9669 22.0055 17.0646 21.0127 17.4383 20.1105C17.8121 19.2083 18.4449 18.4372 19.2569 17.8946ZM20.2986 24.5464C20.8022 24.8829 21.3943 25.0625 22 25.0625C22.8122 25.0625 23.5912 24.7398 24.1655 24.1655C24.7398 23.5912 25.0625 22.8122 25.0625 22C25.0625 21.3943 24.8829 20.8022 24.5464 20.2986C24.2099 19.7949 23.7316 19.4024 23.172 19.1706C22.6124 18.9388 21.9966 18.8782 21.4025 18.9963C20.8085 19.1145 20.2628 19.4062 19.8345 19.8345C19.4062 20.2628 19.1145 20.8085 18.9963 21.4025C18.8782 21.9966 18.9388 22.6124 19.1706 23.172C19.4024 23.7316 19.7949 24.2099 20.2986 24.5464Z" fill="black" stroke="black" stroke-width="0.125"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endif

    @yield('container')

    @if (auth()->user())
        <div class="bottom-navigation-bar">
            <div class="tf-container">
                <ul class="tf-navigation-bar">
                    <li class="{{ Request::is('dashboard-user*') ? 'active' : '' }} mt-1">
                        <a class="fw_6 d-flex justify-content-center align-items-center flex-column" href="{{ url('/dashboard-user') }}">
                            <svg fill="#{{ Request::is('dashboard-user*') ? '0000FF' : '000000' }}" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="width: 25px" viewBox="0 0 495.398 495.398"
                                xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391
                                            v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158
                                            c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747
                                            c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z"/>
                                        <path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401
                                            c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79
                                            c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <span style="color:#{{ Request::is('dashboard-user*') ? '0000FF' : '000000' }}">Home</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('my-donasi*') ? 'active' : '' }}">
                        <a class="fw_4 d-flex justify-content-center align-items-center flex-column" href="{{ url('/my-donasi') }}">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                            style="width: 30px" viewBox="0 0 512.000000 512.000000"
                            preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                            fill="#{{ Request::is('my-donasi*') ? '0000FF' : '000000' }}" stroke="none">
                            <path d="M755 5107 c-61 -24 -104 -58 -133 -105 -16 -26 -141 -258 -278 -517
                            -249 -470 -249 -470 -252 -540 -5 -84 19 -146 73 -194 18 -15 119 -74 223
                            -130 215 -115 250 -125 345 -97 55 16 120 65 144 110 10 18 13 17 54 -12 60
                            -41 128 -114 179 -192 126 -191 218 -272 427 -378 76 -39 299 -171 496 -294
                            l359 -223 22 -70 c13 -38 35 -94 50 -122 l26 -53 -527 0 c-505 0 -529 -1 -560
                            -20 -21 -13 -35 -31 -42 -57 -15 -54 -15 -1868 0 -1948 19 -106 76 -181 174
                            -233 l50 -27 1610 0 1610 0 51 27 c67 35 138 115 161 181 17 49 18 110 18
                            1017 0 531 -3 978 -8 993 -4 15 -22 36 -40 47 -31 19 -53 20 -614 20 l-582 0
                            25 44 c95 171 115 411 50 603 -30 87 -46 118 -111 218 -30 44 -140 233 -245
                            420 -106 187 -210 365 -230 396 -58 84 -177 190 -267 236 -158 82 -278 110
                            -629 148 -421 45 -530 71 -734 175 -242 123 -240 122 -240 156 0 17 -7 54 -16
                            84 -26 86 -72 124 -292 241 -174 92 -198 102 -255 105 -35 2 -75 -2 -92 -9z
                            m263 -279 c114 -60 177 -99 184 -113 9 -19 -26 -91 -242 -496 -138 -261 -260
                            -483 -271 -494 -24 -25 -30 -23 -238 89 -147 80 -161 90 -161 115 0 26 474
                            934 508 974 8 9 22 17 30 17 9 0 94 -41 190 -92z m485 -447 c281 -146 371
                            -170 831 -221 270 -31 382 -49 466 -77 130 -43 246 -126 312 -221 33 -48 248
                            -425 245 -428 -1 -2 -31 4 -67 13 -47 11 -98 14 -182 10 l-118 -4 -27 46
                            c-148 254 -327 353 -586 322 -130 -15 -193 -37 -243 -86 -70 -67 -77 -150 -21
                            -233 14 -20 114 -129 222 -242 109 -113 210 -227 226 -255 60 -103 86 -246 57
                            -311 -11 -22 -17 -25 -46 -20 -20 3 -184 99 -400 234 -202 126 -431 261 -510
                            301 -205 105 -271 161 -391 339 -73 106 -150 187 -234 244 l-58 39 40 72 c21
                            40 96 180 166 312 147 277 135 255 141 255 2 0 82 -40 177 -89z m1102 -781
                            c48 -23 136 -115 172 -179 l23 -39 -48 -28 c-26 -15 -67 -43 -91 -62 l-44 -36
                            -163 169 c-90 94 -164 173 -164 177 0 12 124 27 198 23 48 -2 88 -11 117 -25z
                            m670 -355 c104 -27 184 -72 261 -149 114 -114 168 -242 168 -401 0 -136 -38
                            -245 -123 -353 l-41 -52 -399 0 -399 0 -40 53 c-38 49 -77 117 -70 120 113 55
                            156 100 183 189 31 106 10 280 -49 396 l-25 49 22 20 c64 58 169 112 256 132
                            59 14 193 12 256 -4z m1555 -1350 l0 -195 -917 -1 c-684 0 -927 -3 -953 -12
                            -23 -8 -41 -24 -54 -48 -23 -42 -17 -79 19 -115 l24 -24 941 0 940 0 0 -615 0
                            -615 -29 -32 -29 -33 -1564 -2 c-1228 -2 -1568 0 -1587 10 -13 6 -34 25 -45
                            40 -21 28 -21 35 -21 635 l0 607 291 3 292 2 25 25 c29 30 36 58 25 102 -17
                            65 -29 68 -350 71 l-288 3 0 188 c0 103 3 191 7 194 3 4 741 7 1640 7 l1633 0
                            0 -195z"/>
                            <path d="M2509 1686 c-47 -15 -75 -72 -59 -120 34 -105 190 -80 190 30 0 72
                            -60 113 -131 90z"/>
                            <path d="M2187 1189 c-43 -25 -47 -53 -47 -348 l0 -281 29 -32 29 -33 996 0
                            996 0 27 28 28 27 3 282 c2 200 -1 290 -9 310 -25 62 39 58 -1044 58 -654 -1
                            -996 -4 -1008 -11z m1863 -344 l0 -155 -855 0 -855 0 0 155 0 155 855 0 855 0
                            0 -155z"/>
                            </g>
                            </svg>
                            <span style="color:#{{ Request::is('my-donasi*') ? '0000FF' : '000000' }}" class="ms-2">Donasi</span>
                        </a>
                    </li>

                    <li><a class="fw_4 d-flex justify-content-center align-items-center flex-column" href="{{ url('/my-ipkl') }}"><i class="icon-scan-qr-code"></i> </a> </li>

                    <li class="{{ Request::is('gate-card*') ? 'active' : '' }}">
                        <a class="fw_4 d-flex justify-content-center align-items-center flex-column" href="{{ url('/my-gate-card') }}">
                            <svg fill="#{{ Request::is('my-gate-card*') ? '0000FF' : '000000' }}" style="width: 30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 456.548 456.548" xml:space="preserve">
                            <g id="XMLID_809_">
                                <g>
                                    <g>
                                        <path d="M433.467,81.51H23.081C10.334,81.51,0,91.844,0,104.591v26.274h456.548v-26.274
                                            C456.548,91.844,446.214,81.51,433.467,81.51z"/>
                                        <path d="M0,351.957c0,12.747,10.334,23.081,23.081,23.081h410.385c12.747,0,23.081-10.334,23.081-23.081V198.355H0V351.957z
                                                M196.171,323.51h-29c-8.284,0-15-6.716-15-15s6.716-15,15-15h29c8.284,0,15,6.716,15,15S204.455,323.51,196.171,323.51z
                                                M348.467,293.51h47c8.284,0,15,6.716,15,15s-6.716,15-15,15h-47c-8.284,0-15-6.716-15-15S340.183,293.51,348.467,293.51z
                                                M303.171,308.51c0,8.284-6.716,15-15,15h-29c-8.284,0-15-6.716-15-15s6.716-15,15-15h29
                                            C296.455,293.51,303.171,300.226,303.171,308.51z M58.874,236.51h224c8.284,0,15,6.716,15,15s-6.716,15-15,15h-224
                                            c-8.284,0-15-6.716-15-15S50.59,236.51,58.874,236.51z M58.874,293.51h47c8.284,0,15,6.716,15,15s-6.715,15-15,15h-47
                                            c-8.284,0-15-6.716-15-15S50.59,293.51,58.874,293.51z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            Gate Card
                        </a>
                    </li>

                    <li class="{{ Request::is('my-profile*') ? 'active' : '' }}"><a class="fw_4 d-flex justify-content-center align-items-center flex-column" href="{{ url('/my-profile') }}"><i class="icon-user-outline"></i> Profile</a> </li>
                </ul>
            </div>
        </div>
    @endif


    <div class="tf-panel left">
        <div class="panel_overlay"></div>
        <div class="panel-box panel-left panel-sidebar">
            <div class="header-sidebar bg_white_color is-fixed">
                <div class="tf-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('/dashboard-user') }}" class="sidebar-logo">
                            <img src="{{ url('assets/img/madrid.png') }}"  alt="logo">
                            <span style="color: white; font-size:20px" class="ms-2">Cluster Madrid</span>
                        </a>
                        <a href="javascript:void(0);" class="clear-panel"> <i class="icon-close1"></i> </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="tf-container">
                    <div class="box-content">

                        <ul class="box-nav">
                            <li>
                                <a href="{{ url('/dashboard-user') }}" class="nav-link" >
                                    <span style="{{ Request::is('dashboard-user*') ? 'color: blue' : '' }}">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/notifications') }}" class="nav-link">
                                    <span style="{{ Request::is('notifications*') ? 'color: blue' : '' }}">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/my-ipkl') }}" class="nav-link">
                                    <span style="{{ Request::is('my-ipkl*') ? 'color: blue' : '' }}">IPKL</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/my-donasi') }}" class="nav-link">
                                    <span style="{{ Request::is('my-donasi*') ? 'color: blue' : '' }}">Donasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/my-gate-card') }}" class="nav-link">
                                    <span style="{{ Request::is('my-gate-card*') ? 'color: blue' : '' }}">Gate Card</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/laporan-keuangan') }}" class="nav-link">
                                    <span style="{{ Request::is('laporan-keuangan*') ? 'color: blue' : '' }}">Laporan Keuangan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/laporan-pengeluaran') }}" class="nav-link">
                                    <span style="{{ Request::is('laporan-pengeluaran*') ? 'color: blue' : '' }}">Laporan Pengeluaran</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/my-kritik-saran') }}" class="nav-link">
                                    <span style="{{ Request::is('my-kritik-saran*') ? 'color: blue' : '' }}">Kritik & Saran</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" class="nav-link" onclick="return confirm('Are You Sure?')">
                                    <span style="{{ Request::is('logout*') ? 'color: blue' : '' }}">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="{{ url('/myhr/javascript/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/myhr/javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/myhr/javascript/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/myhr/javascript/swiper.js') }}"></script>
    <script type="text/javascript" src="{{ url('/myhr/javascript/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/clock/dist/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ url('accounting.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ url('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        config = {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        }

        flatpickr("input[type=datetime-local]", config)
        flatpickr("input[type=datetime]", {})

        $(function () {
            $('form').on('submit', function() {
                if ($(this).attr('method').toUpperCase() !== 'GET') {
                    $(':input[type="submit"]').prop('disabled', true);
                }
            });

            $('form').on('keypress', function(event) {
                if (event.which === 13 && $(this).attr('method').toUpperCase() !== 'GET' && !$(event.target).is('textarea')) {
                    event.preventDefault();
                }
            });

            $('#tablePayroll').DataTable( {
                "responsive": true,
                "paging": false,
                "info": false,
                "scrollCollapse": true,
                "autoWidth": false,
                'searching': false
            });
             $("#tableprint").DataTable({
                "responsive": true, "autoWidth": false,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: 'flrtip'
            }).buttons().container().appendTo('#tableprint_wrapper .col-md-6:eq(0)');
        });

    </script>
    @include('sweetalert::alert')
    @stack('script')


</body>

</html>
