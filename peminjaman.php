<h1 class="m-4">Peminjaman</h1>
<div class="card m-3">
    <div class="card-body p-5">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary">Pinjaman</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT peminjaman.id_peminjam, user.username, buku.judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.status_peminjaman 
                                                        FROM peminjaman 
                                                        LEFT JOIN user ON user.id = peminjaman.id 
                                                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($data['username']); ?></td>
                                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_peminjaman']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_pengembalian']); ?></td>
                                <td><?php echo htmlspecialchars($data['status_peminjaman']); ?></td>
                                <td>
                                    <?php
                                    if ($data['status_peminjaman'] != 'dikembalikan') {
                                    ?>
                                        <a href="?page=peminjaman_ubah&id=<?php echo $data['id_peminjam']; ?>" class="btn btn-info btn-sm">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda yakin menghapus peminjaman ini?')" href="?page=peminjaman_hapus&id=<?php echo $data['id_peminjam']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
