<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Kategori Buku</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $kategori = $_POST['kategori'];
                                $query = "INSERT INTO kategori_buku (nama_kategori) VALUES (?)";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("s", $kategori);
                                if ($stmt->execute()) {
                                    echo "<script>alert('Data berhasil ditambahkan.')</script>";
                                } else {
                                    echo "<script>alert('Data gagal ditambahkan.')</script>";
                                }
                                $stmt->close();
                            }
                        ?>
                        <div class="row my-3">
                            <div class="col-md-3">Nama Kategori</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=kategori" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>