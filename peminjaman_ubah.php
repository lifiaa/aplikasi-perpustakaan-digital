<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Ubah Peminjaman Buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST">

                        <?php
                        $id = $_GET['id'];
                        if (isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $id_user = $_SESSION['id_user'] ;
                            $tgl_pinjam = $_POST['tgl_pinjam'];
                            $tgl_pengembalian = $_POST['tgl_pengembalian'];
                            $status_pinjam = $_POST['status_pinjam'];

                            $query = mysqli_query($conn, "UPDATE peminjaman SET id_buku='$id_buku', id_user= '$id_user', tgl_pinjam='$tgl_pinjam', tgl_pengembalian= '$tgl_pengembalian', status_pinjam='$status_pinjam' WHERE id_peminjaman='$id'") ;
                            // $result = mysqli_query($conn, $query);

                            if ($query) {
                                echo '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Data gagal ditambahkan.</div>';
                            }
                        }

                        $query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman= $id");
                        $data = mysqli_fetch_array($query);
                        ?>

                        <!-- input -->
                        <div class="row my-3">
                            <div class="col-md-3">Buku</div>
                            <div class="col-md-8">
                                <select name="id_buku" id="id_kategori" class="form-control">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM buku");
                                    while ($buku = mysqli_fetch_array($query)) {
                                    ?>
                                        <option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php //print_r($_POST); die; ?>

                        <div class="row my-3">
                            <div class="col-md-3">Tanggal Peminjaman</div>
                            <div class="col-md-8"><input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $buku['tgl_pinjam']; ?>"></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-3">Tanggal Pengembalian</div>
                            <div class="col-md-8"><input type="date" class="form-control" name="tgl_pengembalian" value="<?php echo $buku['tgl_pengembalian']; ?>"></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-3">Status Pinjam</div>
                            <div class="col-md-8">
                                <select id="rating" class="form-control" name="status_pinjam">
                                        <option <?php if($data['status_pinjam'] == 'dipinjam') echo 'selected'; ?> value="dipinjam">Dipinjam</option>
                                        <option <?php if($data['status_pinjam'] == 'dikembalikan') echo 'selected'; ?> value="dikembalikan">Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        


                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=peminjaman" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>