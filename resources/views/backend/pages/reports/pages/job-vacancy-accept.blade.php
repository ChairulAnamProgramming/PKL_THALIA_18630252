@extends('backend.pages.reports.print')

@section('content')
    <table class="mb-3">
        <tr>
            <td>Tanggal Awal</td>
            <td>:</td>
            <td>
                <strong>{{ date('d-m-Y', strtotime($date_first)) }}</strong>
            </td>
        </tr>
        <tr>
            <td>Tanggal Ahir</td>
            <td>:</td>
            <td>
                <strong>
                    {{ date('d-m-Y', strtotime($date_last)) }}
                </strong>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-sm text-dark">
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Perusahaan</b></th>
                <th><b>Judul</b></th>
                <th><b>Nama Pelamar</b></th>
                <th><b>No.Induk Kependudukan</b></th>
                <th><b>Tanggal Diterima</b></th>
                <th><b>Tanggal Pengajuan</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jobVacancy->company->name }}</td>
                    <td>{{ $item->jobVacancy->name }}</td>
                    <td>{{ $item->population->name }}</td>
                    <td>{{ $item->population->nik }}</td>
                    <td>{{ $item->date_received }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
