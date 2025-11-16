<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.backoffice._layout.style')

    @yield('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('admin.backoffice._layout.navbar')
            @include('admin.backoffice._layout.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Designed 2025
                </div>
                <div class="footer-right">
                    
                </div>
            </footer>
        </div>
    </div>

    @include('admin.backoffice._layout.script')

    @yield('scripts')

    <script>
        $(document).on('click', '[data-toggle="modal"]', function (e) {
            $('.modal-backdrop.fade.show').hide();
        });
    </script>

    @if ($errors->any())
        <script>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>
    @endif
</body>
</html>