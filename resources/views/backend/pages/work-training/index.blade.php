@extends('backend.template.index')

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelId">
        <i class="mdi mdi-database-plus"></i>
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
                                <th>Pelatihan Kerja</th>
                                <th>Nama Instansi</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Pendidikan</th>
                                <th>Tanggal Berlaku</th>
                                <th>Foto</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workTrainings as $workTraining)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $workTraining->name }}</td>
                                    <td>{{ $workTraining->agency_name }}</td>
                                    <td>{{ $workTraining->address }}</td>
                                    <td>{{ $workTraining->email }}</td>
                                    <td>{{ $workTraining->phone }}</td>
                                    <td>
                                        {{ $workTraining->education->name }}
                                        |
                                        {{ $workTraining->education->major }}
                                    </td>
                                    <td>{{ $workTraining->effective_date }}</td>
                                    <td>
                                        <img src="{{ url('storage') . '/' . $workTraining->image }}" width="40" alt="">
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-toggle="modal"
                                            data-target="#modelId" data-name="{{ $workTraining->name }}"
                                            data-agency_name="{{ $workTraining->agency_name }}"
                                            data-address="{{ $workTraining->address }}"
                                            data-email="{{ $workTraining->email }}"
                                            data-phone="{{ $workTraining->phone }}"
                                            data-education_id="{{ $workTraining->education_id }}"
                                            data-effective_date="{{ $workTraining->effective_date }}"
                                            data-url="{{ route('work_training.update', $workTraining->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('work_training.destroy', $workTraining->id) }}"
                                            method="POST">
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

    @include('backend.pages.work-training.components.modal')

@endsection

@push('after-script')
    <script>
        $('.btn-edit').on('click', function() {
            const url = $(this).data('url');
            const name = $(this).data('name');
            const agency_name = $(this).data('agency_name');
            const address = $(this).data('address');
            const email = $(this).data('email');
            const phone = $(this).data('phone');
            const education_id = $(this).data('education_id');
            const effective_date = $(this).data('effective_date');
            const method = '<input type="hidden" name="_method" value="PATCH">';
            $('#form').attr('action', url);
            $('#method').html(method);
            $('#name').val(name);
            $('#agency_name').val(agency_name);
            $('#address').val(address);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#education_id').val(education_id);
            $('#effective_date').val(effective_date);
        })
    </script>
@endpush
