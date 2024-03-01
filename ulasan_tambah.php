<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Ubah Ulasan Buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST">

                        <?php
                        if (isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];
                            $id_user = $_SESSION['id_user'];

                            $query = "INSERT INTO ulasan_buku(id_buku, ulasan, rating, id_user) VALUES ('$id_buku', '$ulasan', '$rating', '$id_user')";
                            $result = mysqli_query($conn, $query);

                            if ($query) {
                                echo '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>';
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Data gagal ditambahkan.</div>';
                            }
                        }
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
                                        <option value="<?php echo $buku['id_buku']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php //print_r($_POST); die; ?>

                        <div class="row my-3">
                            <div class="col-md-3">Ulasan</div>
                            <div class="col-md-8"><textarea class="form-control" name="ulasan"></textarea></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-3">Rating</div>
                            <div class="col-md-8">
                                <select id="rating" class="form-control" name="rating">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=ulasan" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>