<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1>Ulasan Pengguna</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="?page=ulasan_tambah" class="btn btn-primary my-3">+ Tambah Data</a>
                    <table class="table table-bordered border-primary border-primarytable-striped table-hover">
                        <tr>
                            <th class="table-primary">No</th>
                            <th class="table-primary">User</th>
                            <th class="table-primary">Buku</th>
                            <th class="table-primary">Ulasan</th>
                            <th class="table-primary">Rating</th>
                            <th class="table-primary">Aksi</th>
                        </tr>
                        <?php
                            $no = 0;
                            $query = mysqli_query($conn, "SELECT * FROM ulasan_buku as ub LEFT JOIN user ON user.id_user = ub.id_user LEFT JOIN buku ON buku.id_buku = ub.id_buku");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $data['nama_lengkap'] ?></td>
                            <td><?php echo $data['judul'] ?></td>
                            <td><?php echo $data['ulasan'] ?></td>
                            <td><?php echo $data['rating'] ?></td>
                            <td>
                                <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan'] ?>" class="btn btn-primary my-1">Ubah</a>
                                <a href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan'] ?>" class="btn btn-danger my-1" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>