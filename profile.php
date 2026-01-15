<?php
include "koneksi.php";

// 1. Ambil data user yang sedang login
// Pastikan session dimulai di admin.php, jadi di sini tinggal pakai
$username = $_SESSION['username'];

// GANTI 'webdailyjournal' SESUAI NAMA TABEL USER KAMU
// Di screenshot terlihat nama tabelnya 'webdailyjournal', tapi umumnya nama tabel user adalah 'user'.
// Sesuaikan baris di bawah ini:
$sql = "SELECT * FROM user WHERE username = '$username'"; 
$result = $conn->query($sql);
$data = $result->fetch_assoc();

// 2. Logika Update Data jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    $password_baru = $_POST['password'];
    $foto_baru = $_FILES['foto']['name'];
    
    // A. Ganti Password (jika diisi)
    if ($password_baru != "") {
        $password_hash = md5($password_baru); 
        $sql_update_pass = "UPDATE user SET password = '$password_hash' WHERE username = '$username'";
        
        if ($conn->query($sql_update_pass) === TRUE) {
             echo "<script>alert('Password berhasil diubah!');</script>";
        } else {
             echo "<script>alert('Gagal mengubah password.');</script>";
        }
    }

   
    if ($foto_baru != "") {
        $folder_tujuan = ""; 
        $file_tmp = $_FILES['foto']['tmp_name'];
        $nama_file_baru = rand() . '_' . $foto_baru; 
        
        if (move_uploaded_file($file_tmp, $folder_tujuan . $nama_file_baru)) {
            
            $sql_update_foto = "UPDATE user SET foto = '$nama_file_baru' WHERE username = '$username'";
            
            if ($conn->query($sql_update_foto) === TRUE) {
                echo "<script>alert('Foto berhasil diperbarui!');</script>";
            } else {
                echo "<script>alert('Gagal update database foto.');</script>";
            }
        } else {
            echo "<script>alert('Gagal upload file.');</script>";
        }
    }
    echo "<script>window.location='admin.php?page=profile';</script>";
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-danger shadow-sm">
                <div class="card-header bg-danger-subtle text-dark fw-bold">
                    Profile Settings
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Ganti Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Ganti Foto Profil</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Foto Profil Saat Ini</label>
                            <?php
                            if ($data['foto'] != "") {
                                if (file_exists("" . $data['foto'])) {
                                    echo "<img src='" . $data['foto'] . "' class='img-thumbnail' width='150'>";
                                } else {
                                    echo "<img src='default.jpg' class='img-thumbnail' width='150' alt='Foto tidak ditemukan'>";
                                }
                            } else {
                                echo "<img src='default.jpg' class='img-thumbnail' width='150' alt='Belum ada foto'>";
                            }
                            ?>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>