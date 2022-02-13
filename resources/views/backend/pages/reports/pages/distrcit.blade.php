@extends('backend.pages.reports.print')

@section('content')
    <table class="mb-3">
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>
                <strong>{{ $type }}</strong>
            </td>
        </tr>
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
                <th><b>No.Pendaftaran Pencaker</b></th>
                <th><b>No.Induk Kependudukan</b></th>
                <th><b>Nama</b></th>
                <th><b>Tanggal Pembuatan</b></th>
                <th><b>Tanggal Berlaku</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->population->nik }}</td>
                    <td>{{ $item->population->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->effective_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
