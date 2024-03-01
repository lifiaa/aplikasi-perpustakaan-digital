<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori_buku")); ?> Kategori Buku</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku")); ?> Buku</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total ulasan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ulasan_buku")); ?> Ulasan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user")); ?> Pengguna</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td width="200">Role User</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td width="200">Tanggal Login</td>
                <td width="1">:</td>
                <td><?php echo date('d-m-Y || H:i:s'); ?></td>
            </tr>
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['nama_lengkap']; ?></td>
            </tr>
        </table>
    </div>
</div>





</div>