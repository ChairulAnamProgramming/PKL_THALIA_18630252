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
                            <a href="javascrypt:;" class="btn btn-primary">
                                Lamar Sekarang
                            </a>
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

@endsection
