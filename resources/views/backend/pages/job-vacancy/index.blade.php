@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('job_vacancy.store') }}" class="forms-sample" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="method"></div>
                        <div class="form-group">
                            <label for="company_id">Perusahaan</label>
                            <select class="form-control" value="{{ old('company_id') }}" id="company_id"
                                name="company_id" placeholder="Nama Pendidikan">
                                <option value="">Pilih</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Label Lowongan</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                                placeholder="Nama lowongan pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" value="{{ old('image') }}" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Perekrutan</label>
                            <input type="number" class="form-control" value="{{ old('quantity') }}" id="quantity"
                                name="quantity" placeholder="Jumlah perekrutan pencaker">
                        </div>
                        <div class="form-group">
                            <label for="position">Posisi</label>
                            <textarea type="text" class="form-control" id="position" name="position"
                                placeholder="Posisi pekerjaan">{{ old('position') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Lokasi</label>
                            <textarea type="text" class="form-control" id="location" name="location"
                                placeholder="Lokasi pekerjaan">{{ old('location') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="effective_date">Tanggal Berlaku</label>
                            <input type="date" class="form-control"
                                value="{{ old('effective_date') ? date('Y-m-d', strtotime(old('effective_date'))) : date('Y-m-d') }}"
                                id="effective_date" name="effective_date" placeholder="Nama Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="link">Link (opsional)</label>
                            <input type="text" class="form-control" value="{{ old('link') }}" id="link" name="link"
                                placeholder="Tulis link disini">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
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
                                <th>Nama Perusahaan</th>
                                <th>Label</th>
                                <th>Gambar</th>
                                <th>Jumlah Perekrutan</th>
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
                                    <td>{{ $jobVacancy->position }}</td>
                                    <td>{{ $jobVacancy->location }}</td>
                                    <td>{{ $jobVacancy->effective_date }}</td>
                                    <td>
                                        <a href="{{ $jobVacancy->link }}">
                                            {{ $jobVacancy->link }}
                                        </a>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit"
                                            data-company_id="{{ $jobVacancy->company_id }}"
                                            data-name="{{ $jobVacancy->name }}"
                                            data-quantity="{{ $jobVacancy->quantity }}"
                                            data-position="{{ $jobVacancy->position }}"
                                            data-location="{{ $jobVacancy->location }}"
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

@endsection

@push('after-script')
    <script>
        $('.btn-edit').on('click', function() {
            const url = $(this).data('url');
            const company_id = $(this).data('company_id');
            const name = $(this).data('name');
            const quantity = $(this).data('quantity');
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
            $('#position').val(position);
            $('#location').val(location);
            $('#effective_date').val(effective_date);
            $('#link').val(link);
        })
    </script>
@endpush
