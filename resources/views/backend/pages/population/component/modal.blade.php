  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <form action="{{ route('population.store') }}" id="form" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div id="method"></div>
                  <div class="modal-header">
                      <h5 class="modal-title">
                          <i class="mdi mdi-account-plus"></i>
                          Tambah Data Masyarakat
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name"
                              placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                          <label for="nik">NIK</label>
                          <input type="number" class="form-control" value="{{ old('nik') }}" id="nik" name="nik"
                              placeholder="Nomor Induk Kependudukan">
                      </div>
                      <div class="form-group">
                          <label for="phone">No.Telpon</label>
                          <input type="number" class="form-control" value="{{ old('phone') }}" id="phone"
                              name="phone" placeholder="Nomor Telpon/Whatsapp">
                      </div>
                      <div class="form-group">
                          <label for="email">Email (Aktif)</label>
                          <input type="email" class="form-control" value="{{ old('email') }}" id="email"
                              name="email" placeholder="Alamat Email">
                      </div>
                      <div class="row">
                          <div class="col-12 col-md-6">
                              <div class="form-group">
                                  <label for="place_of_birth">Tempat Lahir</label>
                                  <input type="text" class="form-control" value="{{ old('place_of_birth') }}"
                                      id="place_of_birth" name="place_of_birth" placeholder="Tempat Lahir">
                              </div>
                          </div>
                          <div class="col-12 col-md-6">
                              <div class="form-group">
                                  <label for="date_of_birth">Tanggal Lahir</label>
                                  <input type="date" class="form-control"
                                      value="{{ old('date_of_birth') ? date('Y-m-d', strtotime(old('date_of_birth'))) : date('Y-m-d') }}"
                                      id="date_of_birth" name="date_of_birth" placeholder="Tanggal Lahir">
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="gender">Jenis Kelamin</label>
                          <select class="form-control" value="{{ old('gender') }}" id="gender" name="gender">
                              <option value="">Pilih</option>
                              <option {{ old('gender') === 'male' ? 'selected' : '' }} value="male">Laki-laki</option>
                              <option {{ old('gender') === 'female' ? 'selected' : '' }} value="female">Perempuan
                              </option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="marital_status">Status Kawin</label>
                          <select class="form-control" value="{{ old('marital_status') }}" id="marital_status"
                              name="marital_status">
                              <option value="">Pilih</option>
                              <option {{ old('marital_status') === 'Kawin' ? 'selected' : '' }} value="Kawin">
                                  Kawin
                              </option>
                              <option {{ old('marital_status') === 'Belum Kawin' ? 'selected' : '' }}
                                  value="Belum Kawin">
                                  Belum Kawin
                              </option>
                              <option {{ old('marital_status') === 'Cerai' ? 'selected' : '' }} value="Cerai">
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
                                  <option value="{{ $education->id }}">{{ $education->name }} |
                                      {{ $education->major }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="religion">Agama</label>
                          <select class="form-control" value="{{ old('religion') }}" id="religion" name="religion">
                              <option value="">Pilih</option>
                              <option {{ old('religion') === 'Islam' ? 'selected' : '' }} value="Islam">
                                  Islam
                              </option>
                              <option {{ old('religion') === 'Protestan' ? 'selected' : '' }} value="Protestan">
                                  Protestan
                              </option>
                              <option {{ old('religion') === 'Katolik' ? 'selected' : '' }} value="Katolik">
                                  Katolik
                              </option>
                              <option {{ old('religion') === 'Hindu' ? 'selected' : '' }} value="Hindu">
                                  Hindu
                              </option>
                              <option {{ old('religion') === 'Buddha' ? 'selected' : '' }} value="Buddha">
                                  Buddha
                              </option>
                              <option {{ old('religion') === 'Khonghucu' ? 'selected' : '' }} value="Khonghucu">
                                  Khonghucu
                              </option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="district_id">Kecamatan</label>
                          <select class="form-control" value="{{ old('district_id') }}" id="district_id"
                              name="district_id">
                              <option value="">Pilih</option>
                              @foreach ($districts as $district)
                                  <option value="{{ $district->id }}">{{ $district->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="address">Alamat</label>
                          <textarea class="form-control" id="address"
                              name="address">{{ old('address') }}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="image">Foto</label>
                          <input type="file" class="form-control" id="image" name="image"">
                    </div>
                      <div class="             modal-footer">
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
