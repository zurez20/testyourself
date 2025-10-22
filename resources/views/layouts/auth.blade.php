<!DOCTYPE html>

<html lang="en">

<head>

    <base href="../../../" />
    <title>
        @section('title')
        @show
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    @section('header')
    @show

</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid justify-content-center">

            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                @section('content')
                @show
            </div>

        </div>
    </div>
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1"> {{date('Y')}}&copy;</span>
                <a class="text-gray-800 text-hover-primary">{{ env('APP_NAME') }}</a>
            </div>

        </div>
    </div>

    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

    <!-- Accept Only Numbers -->
    <script>
        $('.numOnly').on('keydown', function(event) {
            var key = event.which;
            var ctrl = event.ctrlKey || event.metaKey;
            if (
                key === 8 || key === 9 || key === 37 || key === 39 || key === 46 ||
                (ctrl && (key === 65 || key === 67 || key === 86 || key === 88)) ||
                (key >= 48 && key <= 57) || (key >= 96 && key <= 105)
            ) {
                return;
            } else {
                event.preventDefault();
            }
        }).on('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
    @section('footer')
    @show

</body>

</html>