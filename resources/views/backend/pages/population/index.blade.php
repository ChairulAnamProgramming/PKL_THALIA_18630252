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
                            @foreach ($populations as $population)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $population->name }}</td>
                                    <td>{{ $population->nik }}</td>
                                    <td>{{ $population->phone }}</td>
                                    <td>{{ $population->user->email }}</td>
                                    <td>{{ $population->place_of_birth }},
                                        {{ date('d-m-Y', strtotime($population->date_of_birth)) }}</td>
                                    <td>
                                        @if ($population->gender === 'male')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td>{{ $population->marital_status }}</td>
                                    <td>{{ $population->education->name . '|' . $population->education->major }}</td>
                                    <td>{{ $population->religion }}</td>
                                    <td>{{ $population->district->name }}</td>
                                    <td>{{ $population->address }}</td>
                                    <td>
                                        <img src="{{ url('storage') . '/' . $population->image }}" width="40" alt="">
                                    </td>
                                    <td>
                                        @if ($population->user->status === '1')
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-toggle="modal"
                                            data-target="#modelId" data-name="{{ $population->name }}"
                                            data-nik="{{ $population->nik }}" data-phone="{{ $population->phone }}"
                                            data-email="{{ $population->user->email }}"
                                            data-place_of_birth="{{ $population->place_of_birth }}"
                                            data-date_of_birth="{{ $population->date_of_birth }}"
                                            data-gender="{{ $population->gender }}"
                                            data-marital_status="{{ $population->marital_status }}"
                                            data-education_id="{{ $population->education_id }}"
                                            data-religion="{{ $population->religion }}"
                                            data-district_id="{{ $population->district_id }}"
                                            data-address="{{ $population->address }}"
                                            data-url="{{ route('population.update', $population->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('population.destroy', $population->id) }}" method="POST">
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

    <br>
    <br>
    <br>

    @include('backend.pages.population.component.modal')

@endsection

@push('after-script')
    <script>
        $('.btn-edit').on('click', function() {
            const url = $(this).data('url');
            const name = $(this).data('name');
            const nik = $(this).data('nik');
            const phone = $(this).data('phone');
            const email = $(this).data('email');
            const place_of_birth = $(this).data('place_of_birth');
            const date_of_birth = $(this).data('date_of_birth');
            const gender = $(this).data('gender');
            const marital_status = $(this).data('marital_status');
            const education_id = $(this).data('education_id');
            const religion = $(this).data('religion');
            const district_id = $(this).data('district_id');
            const address = $(this).data('address');

            const method = '<input type="hidden" name="_method" value="PATCH">';
            $('#form').attr('action', url);
            $('#method').html(method);
            $('#name').val(name);
            $('#nik').val(nik);
            $("#nik").prop('disabled', true);
            $('#phone').val(phone);
            $('#email').val(email);
            $("#email").prop('disabled', true);
            $('#place_of_birth').val(place_of_birth);
            $('#date_of_birth').val(date_of_birth);
            $('#gender').val(gender);
            $('#marital_status').val(marital_status);
            $('#education_id').val(education_id);
            $('#religion').val(religion);
            $('#district_id').val(district_id);
            $('#address').val(address);
        })
    </script>
@endpush
