@extends('backend.template.index')

@section('content')

    <div class="card border-0 shadow rounded-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <h4>Tabel Laporan/Report</h4>
                    <div class="list-group">
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataPendidikan">
                            Laporan Rekap Data Pencaker Berdasarkan Pendidikan
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataKecamatan">
                            Laporan Rekap Data Pencaker Berdasarkan Kecamatan
                        </a>
                        {{-- <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataJenisKelamin">
                            Laporan Rekap Data Jurusan
                        </a> --}}
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataJenisKelamin">
                            Laporan Rekap Data Pencaker Berdasarkan Jenis Kelamin
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataLowonganKerja">
                            Laporan Rekap Data Lowongan Kerja
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataLamaranKerjaDiTerima">
                            Laporan Rekap Data lamaran Kerja Yang telah di Terima
                        </a>
                        {{-- <a href="javascrypt:;" class="list-group-item list-group-item-action disabled">
                            Laporan Data Pencari Kerja
                        </a> --}}
                    </div>
                </div>
                {{-- <div class="col-12 col-md-4">
                    <h4>Grafik Laporan/Report</h4>
                    <div class="list-group">
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataPendidikan">
                            Grafik Data Pencaker Berdasarkan Pendidikan
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    @include('backend.pages.reports.inc.modal')

@endsection
