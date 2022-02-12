@extends('backend.template.index')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <h4>Laporan/Report</h4>
                    <div class="list-group">
                        <a href="javascrypt:;" class="list-group-item list-group-item-action" data-toggle="modal"
                            data-target="#modelIdDataPendidikan">
                            Laporan Rekap Data Pendidikan
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action">
                            Laporan Rekap Data Kecamatan
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action">
                            Laporan Rekap Data Jurusan
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action">
                            Laporan Rekap Data Jenis Kelamin
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action">
                            Laporan Rekap Data Lowongan Kerja
                        </a>
                        <a href="javascrypt:;" class="list-group-item list-group-item-action disabled">
                            Laporan Data Pencari Kerja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.pages.reports.inc.modal')

@endsection
