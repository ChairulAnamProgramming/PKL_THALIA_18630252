<div class="card shadow border">
    <form action="{{ $population ? route('population.update', $population->id) : route('population.store') }}"
        method="POST">
        @csrf
        @if ($population)
            @method('PATCH')
        @endif
        <input type="hidden" name="statue_form" value="biodata">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="name" name="name"
                    placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control" value="{{ $population ? $population->nik : old('nik') }}"
                    id="nik" name="nik" placeholder="Nomor Induk Kependudukan">
            </div>
            <div class="form-group">
                <label for="phone">No.Telpon</label>
                <input type="number" class="form-control"
                    value="{{ $population ? $population->phone : old('phone') }}" id="phone" name="phone"
                    placeholder="Nomor Telpon/Whatsapp">
            </div>
            <div class="form-group">
                <label for="email">Email (Aktif)</label>
                <input type="email" readonly class="form-control" value="{{ Auth::user()->email }}" id="email"
                    name="email" placeholder="Alamat Email">
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="place_of_birth">Tempat Lahir</label>
                        <input type="text" class="form-control"
                            value="{{ $population ? $population->place_of_birth : old('place_of_birth') }}"
                            id="place_of_birth" name="place_of_birth" placeholder="Tempat Lahir">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Tanggal Lahir</label>
                        <input type="date" class="form-control"
                            value="{{ $population ? date('Y-m-d', strtotime($population->date_of_birth)) : date('Y-m-d') }}"
                            id="date_of_birth" name="date_of_birth" placeholder="Tanggal Lahir">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="">Pilih</option>
                    <option {{ $population ? ($population->gender === 'male' ? 'selected' : '') : '' }} value="male">
                        Laki-laki</option>
                    <option {{ $population ? ($population->gender === 'female' ? 'selected' : '') : '' }}
                        value="female">Perempuan
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="marital_status">Status Kawin</label>
                <select class="form-control" id="marital_status" name="marital_status">
                    <option value="">Pilih</option>
                    <option {{ $population ? ($population->marital_status === 'Kawin' ? 'selected' : '') : '' }}
                        value="Kawin">
                        Kawin
                    </option>
                    <option
                        {{ $population ? ($population->marital_status === 'Belum Kawin' ? 'selected' : '') : '' }}
                        value="Belum Kawin">
                        Belum Kawin
                    </option>
                    <option {{ $population ? ($population->marital_status === 'Cerai' ? 'selected' : '') : '' }}
                        value="Cerai">
                        Cerai
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="education_id">Pendidikan Terahir</label>
                <select class="form-control" value="{{ old('education_id') }}" id="education_id"
                    name="education_id">
                    <option value="">Pilih</option>
                    @foreach ($educations as $education)
                        <option
                            {{ $population ? ($population->education_id === $education->id ? 'selected' : '') : '' }}
                            value="{{ $education->id }}">{{ $education->name }} |
                            {{ $education->major }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="religion">Agama</label>
                <select class="form-control" id="religion" name="religion">
                    <option value="">Pilih</option>
                    <option {{ $population ? ($population->religion === 'Islam' ? 'selected' : '') : '' }}
                        value="Islam">
                        Islam
                    </option>
                    <option {{ $population ? ($population->religion === 'Protestan' ? 'selected' : '') : '' }}
                        value="Protestan">
                        Protestan
                    </option>
                    <option {{ $population ? ($population->religion === 'Katolik' ? 'selected' : '') : '' }}
                        value="Katolik">
                        Katolik
                    </option>
                    <option {{ $population ? ($population->religion === 'Hindu' ? 'selected' : '') : '' }}
                        value="Hindu">
                        Hindu
                    </option>
                    <option {{ $population ? ($population->religion === 'Buddha' ? 'selected' : '') : '' }}
                        value="Buddha">
                        Buddha
                    </option>
                    <option {{ $population ? ($population->religion === 'Khonghucu' ? 'selected' : '') : '' }}
                        value="Khonghucu">
                        Khonghucu
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="district_id">Kecamatan</label>
                <select class="form-control" value="{{ old('district_id') }}" id="district_id" name="district_id">
                    <option value="">Pilih</option>
                    @foreach ($districts as $district)
                        <option
                            {{ $population ? ($population->district_id === $district->id ? 'selected' : '') : '' }}
                            value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" id="address"
                    name="address">{{ $population ? $population->address : old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Foto</label>
                <br>
                @if ($population)
                    <img src="{{ url('storage') . '/' . $population->image }}" class="img-fluid" width="100"
                        alt="">
                @else
                    <img src="{{ url('storage/user.png') }}" class="img-fluid" width="100" alt="">
                @endif
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">
                <i class="mdi mdi-save"></i>
                Simpan
            </button>
        </div>
    </form>
</div>
