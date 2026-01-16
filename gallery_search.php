<?php
include "koneksi.php";

$keyword = $_POST['keyword'] ?? '';

$query = "SELECT * FROM gallery 
          WHERE judul LIKE '%$keyword%' 
          ORDER BY id DESC";

$result = mysqli_query($conn, $query);
$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['judul'] ?></td>
    <td>
        <img src="img/<?= $row['gambar'] ?>" width="100">
    </td>
    <td><?= $row['tanggal'] ?></td>
    <td><?= $row['username'] ?></td>
    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="gambar" value="<?= $row['gambar'] ?>">
            <button class="btn btn-danger btn-sm" name="hapus"
                onclick="return confirm('Hapus data?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
<?php } ?>
