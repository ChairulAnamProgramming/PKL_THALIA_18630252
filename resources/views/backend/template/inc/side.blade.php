<!-- partial:./partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigasi Utama</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('district.index') }}">
                            Kecamatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('education.index') }}">
                            Pendidikan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('population.index') }}">
                            Masyarakat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.index') }}">
                            Perusahaan
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="jav">
                <i class="mdi mdi-briefcase menu-icon"></i>
                <span class="menu-title">Pencari Kerja</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('work_training.index') }}">
                <i class="mdi mdi-worker menu-icon"></i>
                <span class="menu-title">Pelatihan Kerja</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('job_vacancy.index') }}">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Lowongan Kerja</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.index') }}">
                <i class="mdi mdi-database menu-icon"></i>
                <span class="menu-title">Laporan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('biodata.index') }}">
                <i class="mdi mdi-face-profile menu-icon"></i>
                <span class="menu-title">Biodata</span>
            </a>
        </li>
    </ul>
</nav>
