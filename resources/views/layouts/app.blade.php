<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('page') | Sistem Informasi Santri Rumah Tahfidz Pejuang Quran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

    <link href="{{ asset('admin/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/green/pace-theme-flash.min.css" rel="stylesheet" integrity="sha512-KKtgYTTeScaUNI+xms81mKoNi6OYIqnpmQaUaOT8a4AsGgvS8Nap0ov6IzDOUAtU/htIflvONUK+vHWatsHy7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('admin/media/logos/favicon.ico') }}" />
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<div class="d-flex flex-column flex-root">
		@yield('content')
	</div>

    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>
    <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js" integrity="sha512-2cbsQGdowNDPcKuoBd2bCcsJky87Mv0LEtD/nunJUgk6MOYTgVMGihS/xCEghNf04DPhNiJ4DZw5BxDd1uyOdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $('#role').change(function(){
                var kel = $('#role option:selected').val();
                if (kel == "Guru") {
                  $("#noId").addClass("mb-3");
                  $("#noId").html(`
                    <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-id-card"></span>
                      </div>
                    </div>
                    `);
                  $("#pesan").html(`
                    @error('nomer')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  `);
                } else if(kel == "Santri") {
                  $("#noId").addClass("mb-3");
                  $("#noId").html(`
                    <input id="nomer" type="text" placeholder="NISN" class="form-control" name="nomer" autocomplete="nomer">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-id-card"></span>
                      </div>
                    </div>
                  `);
                  $("#pesan").html(`
                    @error('nomer')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  `);
                } else {
                  $('#noId').removeClass("mb-3");
                  $('#noId').html('');
                }
            });
        });
        function inputAngka(e) {
          var charCode = (e.which) ? e.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
          }
          return true;
        }
    </script>

    @yield('script')
</body>
</html>
