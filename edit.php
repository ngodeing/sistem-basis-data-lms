<?php
// include database connection file
require 'connection.php';
include_once("connection.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
  $id_barang = $_POST['id_barang'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $jenis = $_POST['jenis'];

  // update user data
  $result = mysqli_query($koneksi, "UPDATE tbl_barang SET id_barang='$id_barang',nama='$nama' , harga = '$harga', stok = '$stok' ,  jenis = '$jenis' WHERE id_barang='$id_barang'");

  // Redirect to homepage to display updated user in list
  header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_barang = $_GET['id_barang'];
// echo $id_barang;
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_barang='$id_barang'");

while ($data = mysqli_fetch_array($result)) {
  $nama = $data['nama'];
  $jenis = $data['jenis'];
  $stok = $data['stok'];
  $harga = $data['harga'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Praktikum Antar Muka</title>
</head>

<body>

  <div class="container">
    <center>
      <h3>Silahkan Masukkan Data</h3>
      <form action="edit_barang.php" method="post" name="form1">
        <table width="50%" border="0">
          <tr>
            <td>Id Barang</td>
            <td><input type="text" name="id_barang" value=<?php echo $id_barang; ?>></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value=<?php echo $harga; ?>></td>
          </tr>
          <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" value=<?php echo $stok; ?>></td>
          </tr>
          <tr>
            <td>Jenis</td>
            <td><input type="text" name="jenis" value=<?php echo $jenis; ?>></td>
          </tr>
          <td></td>
          <td><input class="btn btn-success" type="submit" name="update" value="Update Data"></td>
          </tr>
        </table>
      </form>

      <br>
      <a href="index.php" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Kembali</a>

    </center>

  </div>

</body>

</html>