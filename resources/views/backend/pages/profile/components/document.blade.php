<div class="card shadow border">
    <div class="card-body">
        @if ($population)
            <form
                action="{{ @$yellowcard ? route('yellow-card.update', $yellowcard->id) : route('yellow-card.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (@$yellowcard)
                    @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="file">Kartu Kuning (AK-1)</label>
                    <br>
                    <small>Untuk mendapatkan kartu kuning hubungi Dinas Tenaga Kerja</small>

                    <input type="file" class="form-control {{ @$yellowcard ? 'is-valid' : '' }}" id="file" name="file">
                </div>
                <button class="btn btn-primary">
                    {{ @$yellowcard ? 'Update' : 'Simpan' }}
                </button>
            </form>
            <hr>
            <form
                action="{{ @$curriculumVitae ? route('curriculumVitae.update', $curriculumVitae->id) : route('curriculumVitae.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (@$curriculumVitae)
                    @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="file">Curriculum Vitae (CV)</label>
                    <br>
                    <small>Lampirkan biodata diri anda</small>

                    <input type="file" class="form-control {{ @$curriculumVitae ? 'is-valid' : '' }}" id="file"
                        name="file">
                </div>
                <button class="btn btn-primary">
                    {{ @$curriculumVitae ? 'Update' : 'Simpan' }}
                </button>
            </form>
        @else
            <div class="alert alert-warning" role="alert">
                Lengkapi data diri pelamar, agar bisa menambahkan Kartu Kuning (AK-1) dan Curriculum Vitae (CV).
            </div>
        @endif
    </div>
</div>
