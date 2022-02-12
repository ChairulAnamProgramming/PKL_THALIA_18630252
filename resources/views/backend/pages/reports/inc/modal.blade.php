<!-- Modal -->
<div class="modal fade" id="modelIdDataPendidikan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.education', Crypt::encrypt('education')) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Rekap Data Berdasarkan Pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date_first">Tanggal Awal</label>
                        <input type="date" name="date_first" id="date_first" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date_last">Tanggal Ahir</label>
                        <input type="date" name="date_last" id="date_last" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="education_id">Pendidikan</label>
                        <select type="date" name="education_id" id="education_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($educations as $education)
                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                            @endforeach
                        </select>
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
