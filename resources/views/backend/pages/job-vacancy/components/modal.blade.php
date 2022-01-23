<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form" action="{{ route('job_vacancy.store') }}" class="forms-sample" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <i class="mdi mdi-plus"></i>
                    Tambah Lowongan Pekerjaan
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control summernote" id="description"
                            name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="salary">Gajih</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                            </div>
                            <input type="number" class="form-control" value="{{ old('salary') }}" id="salary"
                                name="salary" placeholder="Ketikan Gajih">
                        </div>

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
