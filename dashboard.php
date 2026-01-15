<?php
include "koneksi.php";

//query untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows; 
$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

//menghitung jumlah baris data article
$jumlah_gallery = $hasil2->num_rows;
$username = $_SESSION['username']; // Ambil username dari session
$sql_user = "SELECT * FROM user WHERE username = '$username'";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();
$foto_db = $row_user['foto'];
$path_foto = "" . $foto_db;

if ($foto_db != "" && file_exists($path_foto)) {
    $gambar_profil = $path_foto;
} else {
    // Gambar default jika user belum punya foto
    $gambar_profil = "https://via.placeholder.com/150"; 
}

print_r($jumlah_article);
?>

<div class="row text-center mb-4">
    <div class="col">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h4 class="display-6">Selamat Datang,</h4>
            <h2 class="fw-bold text-danger"><?php echo $username; ?></h2>
            
            <div class="mt-3">
                <img src="<?php echo $gambar_profil; ?>" 
                     alt="Foto Profil" 
                     class="rounded-circle border border-danger border-3 shadow" 
                     width="150" height="150" 
                     style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>