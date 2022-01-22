@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('education.store') }}" class="forms-sample" method="POST">
                        @csrf
                        <div id="method"></div>
                        <div class="form-group">
                            <label for="name">Pendidikan</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                                placeholder="Nama Pendidikan">
                        </div>
                        <div class="form-group">
                            <label for="major">Jurusan</label>
                            <input type="text" class="form-control" value="{{ old('major') }}" id="major" name="major"
                                placeholder="Nama Jurusan">
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
                <div class="card-body">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pendidikan</th>
                                <th>Jurusan</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $education)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $education->name }}</td>
                                    <td>{{ $education->major }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit"
                                            data-name="{{ $education->name }}" data-major="{{ $education->major }}"
                                            data-url="{{ route('education.update', $education->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('education.destroy', $education->id) }}" method="POST">
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
