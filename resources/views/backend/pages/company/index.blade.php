@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('company.store') }}" class="forms-sample" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="method"></div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                                placeholder="Nama Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="type">Jenis</label>
                            <input type="text" class="form-control" value="{{ old('type') }}" id="type" name="type"
                                placeholder="Nama Jenis Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" id="address" name="address"
                                placeholder="Alamat Kantor">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Deskripsi Perusahaan">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="tel" class="form-control" value="{{ old('phone') }}" id="phone" name="phone"
                                placeholder="Nama Jenis Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                                placeholder="Alamat Email">
                        </div>
                        <div class="form-group">
                            <label for="website">Link Website</label>
                            <input type="text" class="form-control" value="{{ old('website') }}" id="website"
                                name="website" placeholder="Alamat Website">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control" value="{{ old('image') }}" id="image" name="image"
                                placeholder="Alamat Website">
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
                                <th>Nama</th>
                                <th>Jenis Perusahaan</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Foto</th>
                                <th>
                                    <span class="text-danger">*</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->type }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->description }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>{{ $company->user->email }}</td>
                                    <td>
                                        <a href="{{ $company->website }}">
                                            {{ $company->website }}</a>
                                    </td>
                                    <td>
                                        <img src="{{ url('storage') . '/' . $company->image }}" width="40" alt="">
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-success btn-edit" data-name="{{ $company->name }}"
                                            data-type="{{ $company->type }}"
                                            data-url="{{ route('company.update', $company->id) }}">
                                            <i class="mdi mdi-lead-pencil"></i>
                                            Ubah
                                        </button>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="POST">
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
