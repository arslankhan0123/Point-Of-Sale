<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevsSpace CMS</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('admin/assets/images/logos/devsspave.png') }}" />
    <link rel="stylesheet" href="{{ url('admin/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('login') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ url('admin/assets/images/logos/devsspave.png') }}" width="100" alt="">
                                </a>
                                <p class="text-center">DevsSpace CMS</p>

                                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                                </div>

                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

                                    <!-- Password -->
                                    <div>
                                        <x-input-label class="form-control" for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="form-control block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="form-control mt-2" />
                                    </div>

                                    <div class="flex justify-end mt-4">
                                        <x-primary-button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                            {{ __('Confirm') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ url('admin/assets/js/app.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ url('admin/assets/js/dashboard.js') }}"></script>
</body>


</html>


















