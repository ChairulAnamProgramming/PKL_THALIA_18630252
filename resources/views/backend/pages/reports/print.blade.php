<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link rel="stylesheet" href="{{ url('templates/backend') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('templates/backend') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('templates/backend') }}/css/style.css">
    <link rel="shortcut icon" href="{{ url('assets/images') }}/logo.png" />
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-1">
            <a href="{{ route('reports.index') }}" class="btn btn-primary btn-sm">
                Kembali
            </a>
        </div>
    </div>
    <br><br>
    <br><br>
    <div class="container mb-3">
        <div class="row align-items-center">
            <div class="col-2">
                <img src="{{ url('assets/images/default.jpg') }}" class="img-fluid" alt="" width="60">
            </div>
            <div class="col-8">
                <h4 class="text-center m-0">PEMERINTAH KABUPATEN TAPIN</h4>
                <h2 class="text-center m-0">DINAS TENAGA KERJA</h2>
                <h4 class="text-center m-0">Jalan Gubernur H. Aberani Sulaiman No. 129 Telpon (0517) 31673</h4>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
    <div class="container" style="border: solid 1px black;"></div>
    <br>
    <h4 class="text-center">{{ $title }}</h4>
    <div class="container mt-4">
        @yield('content')
    </div>

    <br><br>
    <br><br>



    <script>
        window.print();
    </script>
</body>

</html>
