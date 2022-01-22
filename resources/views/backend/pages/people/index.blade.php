@extends('backend.template.index')

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelId">
        <i class="mdi mdi-account-plus"></i>
        Tambah Data
    </button>

    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No.Telpon</th>
                                <th>Email</th>
                                <th>Tempat & Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Kawin</th>
                                <th>Pendidikan Terahir</th>
                                <th>Agama</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peoples as $people)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $people->name }}</td>
                                    <td>{{ $people->nik }}</td>
                                    <td>{{ $people->phone }}</td>
                                    <td>{{ $people->user->email }}</td>
                                    <td>{{ $people->place_of_birth }},
                                        {{ date('d-m-Y', strtotime($people->date_of_birth)) }}</td>
                                    <td>
                                        @if ($people->gender === 'male')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{ $people->merital_status }}</td>
                                    <td>{{ $people->education->name . '|' . $people->education->major }}</td>
                                    <td>{{ $people->religion }}</td>
                                    <td>{{ $people->district->name }}</td>
                                    <td>{{ $people->address }}</td>
                                    <td>{{ $people->image }}</td>
                                    <td>{{ $people->user->status }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-name="{{ $people->name }}"
                                            data-major="{{ $people->nik }}"
                                            data-url="{{ route('people.update', $people->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('people.destroy', $people->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                <i class="mdi mdi-delete-forever"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('backend.pages.people.component.modal')

@endsection

@push('after-script')
    <script>
        $('.btn-edit').on('click', function() {
            const url = $(this).data('url');
            const name = $(this).data('name');
            const major = $(this).data('major');
            const method = '<input type="hidden" name="_method" value="PATCH">';
            $('#form').attr('action', url);
            $('#method').html(method);
            $('#name').val(name);
            $('#major').val(major);
        })
    </script>
@endpush
