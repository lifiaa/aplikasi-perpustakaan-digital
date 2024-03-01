<?php 

require_once 'koneksi.php';

?>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1>Daftar Buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="?page=buku_tambah" class="btn btn-primary my-3">+ Tambah Data</a>
                    <table class="table table-bordered border-primary border-primarytable-striped table-hover">
                        <tr>
                            <th class="table-primary">No</th>
                            <th class="table-primary">Nama Kategori</th>
                            <th class="table-primary">Judul</th>
                            <th class="table-primary">Penulis</th>
                            <th class="table-primary">Penerbit</th>
                            <th class="table-primary">Tahun Terbit</th>
                            <th class="col-md-3 table-primary">Deskripsi</th>
                            <th class="table-primary">Aksi</th>
                        </tr>
                        <?php
                            $no = 0;
                            $query = mysqli_query($conn, "SELECT * FROM buku LEFT JOIN kategori_buku as kb ON buku.id_kategori = kb.id_kategori");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                            <td><?php echo $data['judul'] ?></td>
                            <td><?php echo $data['penulis'] ?></td>
                            <td><?php echo $data['penerbit'] ?></td>
                            <td><?php echo $data['tahun_terbit'] ?></td>
                            <td><?php echo $data['deskripsi'] ?></td>
                            <td>
                                <a href="?page=buku_ubah&&id=<?php echo $data['id_buku'] ?>" class="btn btn-primary my-1">Ubah</a>
                                <a href="?page=buku_hapus&&id=<?php echo $data['id_buku'] ?>" class="btn btn-danger my-1" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>