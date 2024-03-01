<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Ubah Daftar Buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST">
                        <?php
                        require_once 'koneksi.php';

                        $id = $_GET['id'];
                        if (isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; // Sesuaikan bagian ini sesuai struktur session Anda
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];

                            $query = "UPDATE ulasan_buku SET id_buku=?, id_user=?, ulasan=?, rating=? WHERE id_ulasan=?";
                            $stmt = mysqli_prepare($conn, $query);
                            mysqli_stmt_bind_param($stmt, "iissi", $id_buku, $id_user, $ulasan, $rating, $id);
                            $result = mysqli_stmt_execute($stmt);

                            if ($result) {
                                echo "<script>alert('Data berhasil diperbarui.')</script>";
                            } else {
                                echo "<script>alert('Data gagal diperbarui.')</script>";
                            }
                        }

                        $query = "SELECT * FROM ulasan_buku WHERE id_ulasan = ?";
                        $stmt = mysqli_prepare($conn, $query);
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <!-- Input -->
                        <div class="row my-3">
                            <div class="col-md-3">Buku</div>
                            <div class="col-md-8">
                                <select name="id_buku" id="id_buku" class="form-control">
                                    <?php
                                    $query = "SELECT * FROM buku";
                                    $result = mysqli_query($conn, $query);
                                    while ($buku = mysqli_fetch_assoc($result)) {
                                        $selected = ($buku['id_buku'] == $data['id_buku']) ? 'selected' : '';
                                        echo "<option value='{$buku['id_buku']}' $selected>{$buku['judul']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-3">Ulasan</div>
                            <div class="col-md-8"><textarea class="form-control" name="ulasan"><?php echo $data['ulasan']; ?></textarea></div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-3">Rating</div>
                            <div class="col-md-8">
                                <select class="form-control" name="rating">
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        $selected = ($i == $data['rating']) ? 'selected' : '';
                                        echo "<option value='$i' $selected>$i</option>";
                                    }
                                    ?>
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
