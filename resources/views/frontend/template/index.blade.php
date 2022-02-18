<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DISNAKER TAPIN</title>
    <style>
        .bg-custom-primary {
            background-color: #15406a;
        }

    </style>
</head>

<body>


    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/images/tapin.png') }}" class="img-fluid" width="30" alt="">
                DISNAKER TAPIN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link btn btn-light text-dark me-4" href="#loker">Lowongan Kerja</a>
                    <a class="nav-link btn btn-outline-light text-white" href="#perusahaan">Perusahaan</a>
                </div>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}

    @yield('content')



    <br><br>

    <footer class="text-center text-lg-start bg-light text-muted mt-5">
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Dinas Tenaga Kerja Kabupaten Tapin. All right reserved.
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
