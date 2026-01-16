<?php
$username = $_SESSION['username'];

// Ambil data user yang login
$stmt = $conn->prepare("SELECT username, foto FROM user WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <h5 class="mb-3">Profile User</h5>

                <form method="post" enctype="multipart/form-data">

                    <!-- Username (readonly) -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"
                               class="form-control"
                               value="<?= $user['username']; ?>"
                               readonly>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Ganti password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Kosongkan jika tidak diganti">
                    </div>

                    <!-- Foto -->
                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label><br>
                        <?php if (!empty($user['foto'])): ?>
                            <img src="img/<?= $user['foto']; ?>"
                                 width="100"
                                 class="rounded mb-2">
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <button class="btn btn-danger">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Update password jika diisi
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare(
            "UPDATE user SET password=? WHERE username=?"
        );
        $stmt->bind_param("ss", $password, $username);
        $stmt->execute();
    }

    // Upload foto
    if (!empty($_FILES['foto']['name'])) {
        $foto = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "img/" . $foto);

        $stmt = $conn->prepare(
            "UPDATE user SET foto=? WHERE username=?"
        );
        $stmt->bind_param("ss", $foto, $username);
        $stmt->execute();
    }

    echo "<div class='alert alert-success mt-3'>
            Profile berhasil diperbarui
          </div>";
}
?>
