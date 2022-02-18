@extends('frontend.template.index')

@section('content')
    <div class="container mt-5">
        <img src="{{ url('assets/images/kantor.jpeg') }}" style="height:500px;width:100%!important;border-radius:20px"
            alt="">
    </div>

    <section id="loker" class="container mt-5">
        <h4 class="text-center mb-4">Lowongan Kerja </h4>
        <div class="row">
            @foreach ($jobVacancies as $jobVacancy)
                <div class="col-12 col-md-4">
                    <a href="{{ route('vacancy.detail', $jobVacancy->uuid) }}"
                        class="card border-0 shadow rounded text-decoration-none">
                        <div class="card-body">
                            <img src="{{ url('storage') . '/' . $jobVacancy->company->image }}" width="60"
                                class="img-fluid border rounded" alt="{{ $jobVacancy->company->name }}">
                            <p class="my-2 text-secondary">{{ $jobVacancy->company->name }}</p>
                            <h4>{{ $jobVacancy->name }}</h4>
                            <p class="text-secondary">
                                <i class="mdi mdi-map-marker"></i>
                                {{ Str::limit($jobVacancy->location, 40) }}
                            </p>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        <i class="mdi mdi-clock"></i>
                                        {{ $jobVacancy->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="col-6 text-right">
                                    <p>
                                        <i class="mdi mdi-account-multiple"></i>
                                        {{ $jobVacancy->quantity }} Lowongan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section id="perusahaan" class="container mt-5">
        <h4 class="text-center mb-4">Perusahaan</h4>
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ url('storage') . '/' . $company->image }}" width="60"
                                class="img-fluid border rounded" alt="{{ $company->name }}">
                            <a href="{{ $company->website }}"
                                class="my-2 text-secondary d-block">{{ $company->website }}</a>
                            <h4>{{ $company->name }}</h4>
                            <p class="text-secondary">
                                <i class="mdi mdi-map-marker"></i>
                                {{ Str::limit($company->address, 40) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
