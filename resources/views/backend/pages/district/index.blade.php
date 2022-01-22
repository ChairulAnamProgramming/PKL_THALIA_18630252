@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('district.store') }}" class="forms-sample" method="POST">
                        @csrf
                        <div id="method"></div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama kecamatan">
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
                                <th>Kecamatan</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $district)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $district->name }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-name="{{ $district->name }}"
                                            data-url="{{ route('district.update', $district->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('district.destroy', $district->id) }}" method="POST">
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
            const method = '<input type="hidden" name="_method" value="PATCH">';
            $('#form').attr('action', url);
            $('#method').html(method);
            $('#name').val(name);
        })
    </script>
@endpush
