<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print AK-1</title>
    <link rel="stylesheet" href="{{ url('templates/backend') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('templates/backend') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('templates/backend') }}/css/style.css">
    <link rel="shortcut icon" href="{{ url('assets/images') }}/logo.png" />
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-1">
            <a href="{{ route('job_seeker.index') }}" class="btn btn-primary btn-sm">
                Kembali
            </a>
        </div>
    </div>
    <br><br>
    <div class="mt-5 py-3" style="border:black solid 1px;">
        <div class="row">
            <div class="col-5">
                <table class="table table-sm text-dark">
                    <thead>
                        <tr>
                            <th><b>PENDIDIKAN FORMAL</b></th>
                            <th><b>JURUSAN</b></th>
                            <th><b>TAHUN LULUS</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($population->educationalBackgrounds as $educationalBackground)
                            <tr>
                                <td><b>{{ $educationalBackground->type }}</b></td>
                                <td>{{ $educationalBackground->education->name . ' ' . $educationalBackground->education->major }}
                                </td>
                                <td>{{ $educationalBackground->year }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
                <table style="margin-left: auto">
                    <tr>
                        <td><small>Kabid PPTK</small></td>
                    </tr>
                    <tr>
                        <td><small>Tenaga Kerja</small></td>
                    </tr>
                    <tr>
                        <td>
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td><small>SUPRIADI.SM</small></td>
                    </tr>
                    <tr>
                        <td><small>1975041220090411001</small></td>
                    </tr>
                </table>
            </div>
            <div class="col-7">

                <div class="row align-items-center">
                    <div class="col-1">
                        <img src="{{ url('assets/images/default.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-11">
                        <p class="text-center m-0">PEMERINTAH KABUPATEN TAPIN</p>
                        <h4 class="text-center m-0">DINAS TENAGA KERJA</h4>
                        <p class="text-center m-0">Jalan Gubernur H. Aberani Sulaiman No. 129 Telpon (0517) 31673</p>
                    </div>
                </div>

                <div class="py-1" style="border: black solid 1px;">
                    <h6 class="text-center m-0">
                        KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA
                    </h6>
                </div>

                <table>
                    <tr>
                        <td><b>No.Pendaftaran Pencari Kerja</b></td>
                        <td>:</td>
                        <td>{{ $population->jobSeeker->number }}</td>
                    </tr>
                    <tr>
                        <td><b>No. Induk Kependudukan</b></td>
                        <td>:</td>
                        <td>{{ $population->nik }}</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-3">
                        <img src="{{ url('storage') . '/' . $population->image }}" width="120" height="150" alt="">
                    </div>
                    <div class="col-9 text-dark">
                        <table>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ $population->name }}</td>
                            </tr>
                            <tr>
                                <td>Tempat/Tgl.Lahir</td>
                                <td>:</td>
                                <td>{{ $population->place_of_birth . ', ' . date('d m Y', strtotime($population->date_of_birth)) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $population->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $population->marital_status }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>{{ $population->religion }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $population->address }}</td>
                            </tr>
                            <tr>
                                <td>Telp/Hp</td>
                                <td>:</td>
                                <td>{{ $population->phone }}</td>
                            </tr>
                            <tr>
                                <td>Berlaku s.d</td>
                                <td>:</td>
                                <td>{{ date('d-m-Y', strtotime($population->jobSeeker->effective_date)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 py-3">
        <div class="row justify-content-center">
            <div class="col-5 mr-1" style="border:black solid 1px;">
                <h6>KETENTUAN</h6>
                <ol>
                    <li>BERLAKU NASIONAL</li>
                    <li>BERLAKU BILA ADA PERUBAHAN DATA/KETERANGAN LAINNYA ATAU TELAH MENDAPATKAN PEKERJAAN HARAP SEGERA
                        LAPOR</li>
                    <li>APABILA PENCARI KERJA YANG BERSANGKUTAN TELAH DITERIMA BEKERJA, MAKA INSTANSI/PERUSAHAAN YANG
                        MENERIMA AGAR MENGEMBALIKAN AK/1 INI KE DINAS TENAGA KERJA</li>
                    <li>
                        KARTU INI BERLAKU SELAMA 2 TAHUN DENGAN KEHARUSAN MELAPOR SETIAP 6 BULAN SEKALI BAGI PENCARI
                        KERJA YANG BELUM MENDAPATKAN PEKERJAAN
                    </li>
                </ol>
            </div>
            <div class="col-5 ml-1" style="border:black solid 1px;">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>LAPORAN</th>
                            <th>TGL-BLN-THN</th>
                            <th>
                                TANDA TANGAN PENGANTAR KERJA/ PETUGAS PENDAFTARAN <br>
                                (CANTUMKAN NAMA DAN NIP)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PERTAMA</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>KEDUA</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>KETIGA</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br>
    <br><br>



</body>

</html>
