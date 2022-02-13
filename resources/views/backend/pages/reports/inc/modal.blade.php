<div class="modal fade" id="modelIdDataPendidikan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.jobseeker', Crypt::encrypt('education')) }}" method="POST">
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
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modelIdDataKecamatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.jobseeker', Crypt::encrypt('district')) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Rekap Data Berdasarkan Kecamatan</h5>
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
                        <label for="district_id">Kecamatan</label>
                        <select type="date" name="district_id" id="district_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modelIdDataJenisKelamin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.jobseeker', Crypt::encrypt('gender')) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Rekap Data Berdasarkan Jenis Kelamin</h5>
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
                        <label for="gender">Jenis Kelamin</label>
                        <select type="date" name="gender" id="gender" class="form-control">
                            <option value="">---</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modelIdDataLowonganKerja" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.jobvacancy', Crypt::encrypt('jobvacancy')) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Rekap Data Lowongan Kerja</h5>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modelIdDataLamaranKerjaDiTerima" tabindex="-1" role="dialog"
    aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('reports.jobvacancy', Crypt::encrypt('jobvacancy')) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Rekap Data Lamaran Kerja Yang Telah di Terima</h5>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
