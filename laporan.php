<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1>Laporan peminjaman buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="cetak.php" target="_blank" class="btn btn-primary my-3"><i class="ri-printer-fill mr-2"></i>Cetak Data</a>
                    <table class="table table-bordered border-primary border-primarytable-striped table-hover">
                        <tr>
                            <th class="table-primary">No</th>
                            <th class="table-primary">User</th>
                            <th class="table-primary">Buku</th>
                            <th class="table-primary">Tanggal Peminjaman</th>
                            <th class="table-primary">Tanggal Pengemblian</th>
                            <th class="table-primary">Status Peminjaman</th>
                        </tr>
                        <?php
                        $no = 0;
                        $query = mysqli_query($conn, "SELECT * FROM peminjaman as pj LEFT JOIN user ON user.id_user = pj.id_user LEFT JOIN buku ON buku.id_buku = pj.id_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo ++$no; ?></td>
                                <td><?php echo $data['nama_lengkap'] ?></td>
                                <td><?php echo $data['judul'] ?></td>
                                <td><?php echo $data['tgl_pinjam'] ?></td>
                                <td><?php echo $data['tgl_pengembalian'] ?></td>
                                <td><?php echo $data['status_pinjam'] ?></td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>