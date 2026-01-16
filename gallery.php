<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <button type="button" class="btn btn-secondary mb-2" 
                data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Gallery
            </button>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Cari Gallery...">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th class="w-25">Judul</th>
                    <th class="w-25">Gambar</th>
                    <th class="w-25">Tanggal</th>
                    <th class="w-25">Username</th>
                    <th class="w-25">Aksi</th>
                </tr>
            </thead>
            <tbody id="result"></tbody>
        </table>
    </div>

    <!-- Modal Tambah Gallery -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Gallery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function loadData(keyword = '') {
    $.ajax({
        url: "gallery_search.php",
        type: "POST",
        data: { keyword: keyword },
        success: function(data) {
            $("#result").html(data);
        }
    });
}

loadData();

$("#search").keyup(function () {
    loadData($(this).val());
});
</script>

<?php
include "upload_foto.php";

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar = '';

    if ($_FILES['gambar']['name'] != '') {
        $upload = upload_foto($_FILES['gambar']);

        if ($upload['status']) {
            $gambar = $upload['message'];
        } else {
            echo "<script>alert('".$upload['message']."');</script>";
            exit;
        }
    }

    $stmt = $conn->prepare(
        "INSERT INTO gallery (judul, gambar, tanggal, username)
         VALUES (?,?,?,?)"
    );

    $stmt->bind_param("ssss", $judul, $gambar, $tanggal, $username);
    $stmt->execute();

    echo "<script>
        alert('Simpan gallery sukses');
        document.location='admin.php?page=gallery';
    </script>";
}

if (isset($_POST['hapus'])) {
    if ($_POST['gambar'] != '') {
        unlink("img/".$_POST['gambar']);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();

    echo "<script>
        alert('Hapus gallery sukses');
        document.location='admin.php?page=gallery';
    </script>";
}
?>
