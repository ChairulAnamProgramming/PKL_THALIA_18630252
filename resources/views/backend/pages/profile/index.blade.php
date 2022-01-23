@extends('backend.template.index')

@section('content')

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-data-diri-tab" data-toggle="pill" href="#pills-data-diri" role="tab"
                aria-controls="pills-data-diri" aria-selected="true">
                <i class="mdi mdi-file-document-box"></i>
                Data Diri Pelamar
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">
                <i class="mdi mdi-school"></i>
                Dokumen Wajib
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">
                <i class="mdi mdi-library-plus"></i>
                Pendidikan Pelamar
            </a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-data-diri" role="tabpanel" aria-labelledby="pills-data-diri-tab">
            @include('backend.pages.profile.components.my-data')
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('backend.pages.profile.components.document')
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            @include('backend.pages.profile.components.education')
        </div>
    </div>


@endsection
