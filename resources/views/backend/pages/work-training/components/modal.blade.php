<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" action="{{ route('work_training.store') }}" class="forms-sample" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="mdi mdi-database-plus"></i>
                        Tambah Data Pelatihan Kerja
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div id="method"></div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                            placeholder="Nama pelatihan kerja">
                    </div>
                    <div class="form-group">
                        <label for="agency_name">Nama Instansi</label>
                        <input type="text" class="form-control" value="{{ old('agency_name') }}" id="agency_name"
                            name="agency_name" placeholder="Nama Instansi/Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="address"
                            placeholder="Alamat kantor">{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (Aktif)</label>
                        <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                            placeholder="Alamat email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="tel" class="form-control" value="{{ old('phone') }}" id="phone" name="phone"
                            placeholder="Nomor telepon kantor">
                    </div>
                    <div class="form-group">
                        <label for="education_id">Pendidikan</label>
                        <select type="tel" class="form-control" id="education_id" name="education_id"
                            placeholder="Nomor telepon kantor">
                            <option value="">Pilih</option>
                            @foreach ($educations as $education)
                                <option {{ old('education_id') === $education->id ? 'selected' : '' }}
                                    value="{{ $education->id }}">
                                    {{ $education->name }} |
                                    {{ $education->major }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="effective_date">Tanggal Berlaku</label>
                        <input type="date" class="form-control"
                            value="{{ old('effective_date') ? date('Y-m-d', strtotime(old('effective_date'))) : date('Y-m-d') }}"
                            id="effective_date" name="effective_date">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simapn
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
