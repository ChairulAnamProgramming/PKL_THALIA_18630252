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
                <th><b>Gambar</b></th>
                <th><b>Jumlah Perekrutan</b></th>
                <th><b>Posisi</b></th>
                <th><b>Lokasi</b></th>
                <th><b>Gaji</b></th>
                <th><b>Tanggal Berlaku</b></th>
                <th><b>Link</b></th>
                <th><b>Tanggal Dibuat</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->company->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ url('storage') . '/' . $item->image }}" class="" width="70" alt="">
                    </td>
                    <td>{{ $item->quantity }} Orang</td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->salary ? 'Rp.' . number_format($item->salary, 2, ',', '.') : 'Dirahasiakan' }}</td>
                    <td>{{ $item->effective_date }}</td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
