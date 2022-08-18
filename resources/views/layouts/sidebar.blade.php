<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if (Auth::user()->status == 'admin')
            <li class="nav-item has-treeview">
                <a href="{{ route('kelola_akun') }}" class="nav-link mr-1">
                    &nbsp;<i class="fas fa-users mr-2"></i>
                    <p>
                        Kelola Akun
                    </p>
                </a>
            </li>


            <li class="nav-item has-treeview">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_jenis') }}" class="nav-link">
                    <i class="fas fa-stream mr-1 ml-1"></i>
                    <p>
                        Jenis Tanaman
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_tanaman') }}" class="nav-link">
                    <i class="fas fa-fan ml-1 mr-2"></i>
                    <p>
                        Kelola Tanaman
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('kelola_stok') }}" class="nav-link">
                    <i class="fas fa-boxes ml-1 mr-2"></i>
                    <p>
                        Kelola Stok
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Route('kelola_penjualan') }}" class="nav-link">
                    <i class="fas fa-cart-plus ml-1 mr-1"></i>
                    <p>
                        Kelola Penjualan dan Transaksi
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ Route('laporan') }}" class="nav-link">
                    <i class="fas fa-cart-plus ml-1 mr-1"></i>
                    <p>
                        Laporan Akhir
                    </p>
                </a>
            </li> --}}

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-tasks ml-1 mr-1"></i>
                    <p>
                        Laporan Akhir
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Laporan Akhir Penjualan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tanaman_penutup') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Penutup Tanah</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tanaman_rendah') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Semak Rendah</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tanaman_sedang') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Semak Sedang</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tanaman_tinggi') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Semak Tinggi</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tanaman_perdu') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Perdu Rendah</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('stok_terjual') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Stok Terjual</p>
                        </a>
                    </li>

                </ul>
            </li>

        @endif

        @if (Auth::user()->status == 'karyawan')
            <li class="nav-item has-treeview">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kelola_stok') }}" class="nav-link">
                    <i class="fas fa-boxes ml-1 mr-2"></i>
                    <p>
                        Kelola Stok
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ Route('kelola_penjualan') }}" class="nav-link">
                    <i class="fas fa-cart-plus ml-1 mr-1"></i>
                    <p>
                        Kelola Penjualan dan Transaksi
                    </p>
                </a>
            </li>
        @endif
    </ul>
</nav>
