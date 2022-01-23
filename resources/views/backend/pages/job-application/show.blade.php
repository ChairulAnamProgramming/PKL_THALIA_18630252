@extends('backend.template.index')


@section('content')

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card shadow border-0 rounded">
                <div class="card-header d-flex justify-content-end bg-white">
                    @if ($jobApplication === 'panding')
                        @if (Auth::user()->rule === 'company')
                            <form action="{{ route('job_application.update', $jobApplication->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{ Crypt::encrypt('rejected') }}" name="status">
                                <button class="btn btn-danger mr-2">Tolak</button>
                            </form>
                            <form action="{{ route('job_application.update', $jobApplication->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{ Crypt::encrypt('received') }}" name="status">
                                <button class="btn btn-success"
                                    onclick="return confirm('Apakah anda suda yakin?');">Terima</button>
                            </form>
                        @endif
                    @endif
                    @if ($jobApplication->status === 'rejected')
                        <button class="btn btn-danger btn-block">
                            Status telah di tolak
                        </button>
                    @endif
                    @if ($jobApplication->status === 'received')
                        <button class="btn btn-success btn-block">
                            Status telah di terima
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <img src="{{ url('storage') . '/' . $jobApplication->population->image }}" width="80"
                        class="img-fluid border  rounded" alt="">
                    <p class="text-secondary">{{ $jobApplication->population->nik }}</p>
                    <h6>{{ $jobApplication->population->name }}</h6>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p class="text-secondary">
                                <i class="mdi mdi-cellphone"></i>
                                {{ $jobApplication->population->phone }}
                            </p>
                            <p class="text-secondary">
                                <i class="mdi mdi-mail-ru"></i>
                                {{ $jobApplication->population->user->email }}
                            </p>
                            <p class="text-secondary">
                                <i class="mdi mdi-calendar"></i>
                                {{ $jobApplication->population->place_of_birth . ',' . $jobApplication->population->date_of_birth }}
                            </p>
                            <p class="text-secondary">
                                @if ($jobApplication->population->gender === 'male')
                                    <i class="mdi mdi-gender-male"></i>
                                    Laki-laki
                                @else
                                    <i class="mdi mdi-gender-female"></i>
                                    Perempuan
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="text-secondary">
                                <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                {{ $jobApplication->population->marital_status }}
                            </p>
                            <p class="text-secondary">
                                <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                {{ $jobApplication->population->religion }}
                            </p>
                            <p class="text-secondary">
                                <i class="mdi mdi-map-marker"></i>
                                {{ $jobApplication->population->address }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h6>
                                @if ($jobApplication->population->yellowCard)
                                    <a href="{{ url('storage') . '/' . $jobApplication->population->yellowCard->file }}">Download
                                        File AK-1</a>
                                @else
                                    Belum di upload
                                @endif
                            </h6>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6>
                                @if ($jobApplication->population->curriculumVitae)
                                    <a
                                        href="{{ url('storage') . '/' . $jobApplication->population->curriculumVitae->document }}">Download
                                        Dokumen CV
                                    </a>
                                @else
                                    Belum di upload
                                @endif
                            </h6>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pendidikan</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Dokumen Ijazah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobApplication->population->educationalBackgrounds as $educationalBackground)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $educationalBackground->education->name }}</td>
                                        <td>{{ $educationalBackground->education->major }}</td>
                                        <td>{{ $educationalBackground->year }}</td>
                                        <td>
                                            <a href="{{ url('storage') . '/' . $educationalBackground->document }}">
                                                Download dokument
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
