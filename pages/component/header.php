<header>
        <nav>
            <ul>
                <li><a href="">
                    <img src="../assets/icon.svg" alt="icon" style="width: 40px">
                </a></li>
                <li><a href="Home.php">Beranda</a></li>
                <div class="dropdown">
                <button class="dropbtn">Data Master <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Anggota.php">Data Anggota</a>
                        <a href="Buku.php">Data Buku</a>
                    </div>
                </div>
                <div class="dropdown">
                <button class="dropbtn">Data Transaksi <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Peminjaman.php">Transaksi Peminjaman</a>
                        <a href="Pengembalian.php">Transaksi Pengembalian</a>
                    </div>
                </div>
                <li><a href="LaporanTransaksi.php">Laporan Transaksi</a></li>
            </ul>
            <a class="btn-logout" href="../proses/logout.php" onclick="alert('berhasil logout')">LOGOUT</a>
        </nav>
</header>