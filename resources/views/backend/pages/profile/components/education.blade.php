<div class="card shadow border">
    <div class="card-body">

        <!-- Button trigger modal -->
        @if ($population)
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelId">
                <i class="mdi mdi-plus"></i>
                Tambah
            </button>

            <div class="table-responsive">
                <table class="table datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pendidikan</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>Dokumen</th>
                            <th>
                                <span class="text-danger">*</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($educationBackgrounds as $educationBackground)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $educationBackground->education->name }}</td>
                                <td>{{ $educationBackground->education->major }}</td>
                                <td>{{ $educationBackground->year }}</td>
                                <td>
                                    <a href="{{ url('storage') . '/' . $educationBackground->document }}"
                                        target="blank">
                                        Lihat Dokumen
                                    </a>
                                </td>
                                <td>
                                    <form
                                        action="{{ route('educational-background.destroy', $educationBackground->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                            <i class="mdi mdi-delete-forever"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Lengkapi data diri pelamar, agar bisa menambahkan riwayat pendidikan anda.
            </div>
        @endif

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('educational-background.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Tambah Riwayat Pendidikan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="education_id">Pendidikan</label>
                        <select class="form-control" id="education_id" name="education_id">
                            <option value="">Pilih</option>
                            @foreach ($educations as $education)
                                <option value="{{ $education->id }}">{{ $education->name }} |
                                    {{ $education->major }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Tahun</label>
                        <br>
                        <small>Tahun lulus</small>
                        <input type="month" class="form-control" value="{{ date('Y-m-d') }}" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="document">Dokumen</label>
                        <br>
                        <small>Ijazah Lulus Pendidikan</small>
                        <input type="file" class="form-control" id="document" name="document">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
