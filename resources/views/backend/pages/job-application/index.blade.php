@extends('backend.template.index')


@section('content')

    <div class="card border-0 shadow">
        <div class="card-body table-responsive">
            <table class="table datatables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Loker</th>
                        <th>Nama Pelamar</th>
                        <th>NIK</th>
                        <th>Status</th>
                        <th>
                            <span class="text-danger"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jobApplications)
                        @foreach ($jobApplications as $jobApplication)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jobApplication->jobVacancy->name }}</td>
                                <td>{{ $jobApplication->population->name }}</td>
                                <td>{{ $jobApplication->population->nik }}</td>
                                <td>
                                    @if ($jobApplication->status === 'panding')
                                        <span class="badge badge-warning">Panding</span>
                                    @endif
                                    @if ($jobApplication->status === 'received')
                                        <span class="badge badge-success">Diterima</span>
                                    @endif
                                    @if ($jobApplication->status === 'rejected')
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('job_application.show', Crypt::encrypt($jobApplication->id)) }}"
                                        class="btn btn-sm btn-primary">
                                        Lihat Detail Pelamar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
