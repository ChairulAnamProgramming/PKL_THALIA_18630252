@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('job_seeker.store') }}" class="forms-sample" method="POST">
                        @csrf
                        <input type="hidden" value="" name="population_id" id="population_id">
                        <div id="method"></div>
                        <div id="profile"></div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" value="{{ old('nik') }}" id="nik" name="nik"
                                    placeholder="Masukan NIK Pencaker">
                                <button type="button" class="input-group-prepend bg-white" id="search-nik">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="mdi mdi-account-search text-primary"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="effective_date">Tanggal Berlaku</label>
                            <input type="date" class="form-control" value="{{ old('effective_date') }}"
                                id="effective_date" name="effective_date">
                        </div>
                        <button class="btn btn-primary mr-2">
                            <i class="mdi mdi-content-save"></i>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No.Pendaftaran Pencari Kerja</th>
                                <th>No.Induk Kependudukan</th>
                                <th>Tanggal Pembuatan</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobSeekers as $jobSeeker)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jobSeeker->number }}</td>
                                    <td>{{ $jobSeeker->population->nik }}</td>
                                    <td>{{ $jobSeeker->created_at }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('job_seeker.show', Crypt::encrypt($jobSeeker->population->id)) }}"
                                            class="btn btn-outline-primary btn-edit" data-name="{{ $jobSeeker->name }}"
                                            data-major="{{ $jobSeeker->major }}"
                                            data-url="{{ route('education.update', $jobSeeker->id) }}">
                                            <i class="mdi mdi-printer"></i>
                                            Cetak
                                        </a>
                                        <form action="{{ route('job_seeker.destroy', $jobSeeker->id) }}" method="POST">
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
@endsection

@push('after-script')
    <script>
        $('#search-nik').on('click', function() {
            const nik = $('#nik').val();
            $.ajax({
                url: '{{ route('population.autoComplite') }}',
                method: 'POST',
                data: {
                    nik,
                    '_token': token
                },
                success: function(res) {
                    $('#profile').html(`
                    <div class="alert alert-success" role="alert">
                        <h6>${res.name}</h6>
                        <h6>${res.place_of_birth}, ${res.date_of_birth}</h6>
                        <hr/>
                        <h6>${res.address}</h6>
                    </div>
                    `);
                    $('#population_id').val(res.id)
                }
            })
        });




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
