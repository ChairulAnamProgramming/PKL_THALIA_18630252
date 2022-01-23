@extends('backend.template.index')

@section('content')

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <img src="{{ url('storage') . '/' . $jobVacancy->company->image }}" width="90"
                        class="img-fluid border rounded" alt="">
                    <h6 class="my-2 text-secondary">{{ $jobVacancy->company->name }}</h6>
                    <h3>{{ $jobVacancy->name }}</h3>
                    <h6 class="text-secondary">
                        <i class="mdi mdi-map-marker"></i>
                        {{ $jobVacancy->location }}
                    </h6>
                    <div class="row">
                        <div class="col-6 text-secondary">
                            <p>
                                <i class="mdi mdi-clock"></i>
                                {{ $jobVacancy->created_at->diffForHumans() }}
                            </p>
                            <p>
                                <i class="mdi mdi-account-multiple"></i>
                                {{ $jobVacancy->quantity }} Lowongan
                            </p>
                            <p>
                                <i class="mdi mdi-calendar"></i>
                                {{ date('d F Y', strtotime($jobVacancy->effective_date)) }}
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            @if ($population)
                                @if ($job_application)
                                    <button class="btn btn-success">
                                        Lamaran telah di ajukan
                                    </button>
                                @else
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modelLoker">
                                        Lamar Sekarang
                                    </button>
                                @endif
                            @else
                                <button class="btn btn-secondary">
                                    Lengkapi biodata anda terlebih dahulu
                                </button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <h6>Deskripsi Pekerjaan</h6>
                    <br>
                    <div class="text-secondary">
                        {!! $jobVacancy->description !!}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div>
                                <h6 class="text-secondary">Posisi</h6>
                                <p>{{ $jobVacancy->position }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div>
                                <h6 class="text-secondary">Rentang Gaji</h6>
                                <p>
                                    @if ($jobVacancy->salary)
                                        Rp.{{ number_format($jobVacancy->salary, 2, ',', '.') }}
                                    @else
                                        Dirahasiakan
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <h6 class="text-secondary">Tentang Perusahaan</h6>
            <h5 class="mb-3">{{ $jobVacancy->company->name }}</h5>
            <div class="text-secondary">{!! Str::limit($jobVacancy->company->description, 100) !!}</div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelLoker" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('job_application.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="job_vacancie_id" value="{{ $jobVacancy->id }}">
                    <div class="modal-body text-center">
                        <h6>Apakah biodata anda sudah anda lengkapi?</h6>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary">
                            Sudah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
