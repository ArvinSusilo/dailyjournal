<?php
         include "koneksi.php";

$keyword = $_POST['keyword'];

$sql = "SELECT * FROM user
        WHERE username LIKE ? OR password LIKE ? OR foto LIKE ?
        ORDER BY id DESC";

$stmt = $conn->prepare($sql);

    ?>
    </td>
    <td>
 <button type="submit" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">Submit</button>
<!-- Awal Modal Edit -->
<div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit galeri</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul galeri" value="<?= $row["judul"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                        <?php
                        if ($row["gambar"] != '') {
                            if (file_exists('' . $row["gambar"] . '')) { 
                                echo '<br><img src="' . $row["gambar"] . '" class="img-fluid" alt="Gambar galeri">';
                            }
                        }
                        ?>
                        <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Edit -->

       
</td>
                        </tr>
		                
                    <?php
                    }
                    ?>
