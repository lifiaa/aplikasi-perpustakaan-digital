<?php include 'koneksi.php'; ?>


<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cetak Laporan</title>
</head>

<body>
    <div class="container">
        
    <h2 align="center" class="my-4">Laporan Peminjaman Buku</h2>

    <table class="table table-striped" border="1" width="100%" cellpadding="5">
        <tr>
            <th class="table-primary text-secondary">No</th>
            <th class="table-primary text-secondary">User</th>
            <th class="table-primary text-secondary">Buku</th>
            <th class="table-primary text-secondary">Tanggal Peminjaman</th>
            <th class="table-primary text-secondary">Tanggal Pengemblian</th>
            <th class="table-primary text-secondary">Status Peminjaman</th>
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
    <!-- <script>
    window.print();
    setTimeout(function(){
        window.close();
    }, 100);
</script> -->
</body>

</html>