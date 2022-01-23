<!DOCTYPE html>
<html lang="id">

@include('backend.template.inc.head')

<body>
    <div class="container-scroller d-flex">

        @include('backend.template.inc.side')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('backend.template.inc.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session('success') || session('danger'))
                        <div class="alert alert-{{ session('success') ? 'success' : 'warning' }}" role="alert">
                            <strong>{{ session('success') ? session('success') : session('danger') }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                @include('backend.template.inc.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('backend.template.inc.script')
</body>

</html>
