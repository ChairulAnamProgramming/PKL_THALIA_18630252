@extends('backend.template.index')

@push('after-css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelId">
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
                                <th>Nama Perusahaan</th>
                                <th>Label</th>
                                <th>Gambar</th>
                                <th>Jumlah Perekrutan</th>
                                <th>Deskripsi</th>
                                <th>Gajih</th>
                                <th>Posisi</th>
                                <th>Lokasi</th>
                                <th>Tanggal Berlaku</th>
                                <th>Link</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobVacancies as $jobVacancy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jobVacancy->company->name }}</td>
                                    <td>{{ $jobVacancy->name }}</td>
                                    <td>
                                        <img src="{{ url('storage') . '/' . $jobVacancy->image }}" width="40" alt="">
                                    </td>
                                    <td>{{ $jobVacancy->quantity }} Orang</td>
                                    <td>
                                        <a href="{{ route('job_vacancy.show', $jobVacancy->uuid) }}">
                                            Lihat detail
                                        </a>
                                    </td>
                                    <td>{{ $jobVacancy->salary ? 'Rp.' . number_format($jobVacancy->salary, 2, ',', '.') : 'Dirahasiakan' }}
                                    </td>
                                    <td>{{ $jobVacancy->position }}</td>
                                    <td>{{ $jobVacancy->location }}</td>
                                    <td>{{ $jobVacancy->effective_date }}</td>
                                    <td>
                                        <a href="{{ $jobVacancy->link }}">
                                            {{ $jobVacancy->link }}
                                        </a>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-toggle="modal"
                                            data-target="#modelId" data-company_id="{{ $jobVacancy->company_id }}"
                                            data-name="{{ $jobVacancy->name }}"
                                            data-quantity="{{ $jobVacancy->quantity }}"
                                            data-position="{{ $jobVacancy->position }}"
                                            data-location="{{ $jobVacancy->location }}"
                                            data-description="{{ $jobVacancy->description }}"
                                            data-salary="{{ $jobVacancy->salary }}"
                                            data-effective_date="{{ $jobVacancy->effective_date }}"
                                            data-link="{{ $jobVacancy->link }}"
                                            data-url="{{ route('job_vacancy.update', $jobVacancy->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('job_vacancy.destroy', $jobVacancy->id) }}" method="POST">
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

    @include('backend.pages.job-vacancy.components.modal')

@endsection

@push('after-script')

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Tulis Kualifikasi, Persyaratan, Keterampilan di butuhkan',
            height: 200
        });
        $('.btn-edit').on('click', function() {
            const url = $(this).data('url');
            const company_id = $(this).data('company_id');
            const name = $(this).data('name');
            const quantity = $(this).data('quantity');
            const description = $(this).data('description');
            const salary = $(this).data('salary');
            const position = $(this).data('position');
            const location = $(this).data('location');
            const effective_date = $(this).data('effective_date');
            const link = $(this).data('link');
            const method = '<input type="hidden" name="_method" value="PATCH">';
            $('#form').attr('action', url);
            $('#method').html(method);
            $('#company_id').val(company_id);
            $('#name').val(name);
            $('#quantity').val(quantity);
            $('#description').val(description);
            $('#salary').val(salary);
            $('#position').val(position);
            $('#location').val(location);
            $('#effective_date').val(effective_date);
            $('#link').val(link);
        });
    </script>
@endpush
