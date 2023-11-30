<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Antarmuka Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <center><h2>Learning Management System</h2></center>
		<button type="button" class="btn btn-success float-right" styles="margin:20px" onclick="location.href='create.php'">Tambah Data</button>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col" style="text-align: center;">Nama Lengkap</th>
                    <th scope="col" style="text-align: center;">Tanggal Lahir</th>
                    <th scope="col" style="text-align: center;">Email</th>
                    <th scope="col" style="text-align: center;">Jenis Kelamin</th>
                    <th scope="col" style="text-align: center;">Prodi</th>
                    <th scope="col" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'koneksi.php';
                $hasil = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY NIM");
                ?>
                <tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) {
                        echo "<th>".$no."</th>";
                        echo "<td>".$data['NIM']."</td>";
                        echo "<td>".$data['nama_mhs']."</td>";
                        echo "<td>".$data['tgl_lahir']."</td>";
                        echo "<td>".$data['email']."</td>";
                        echo "<td>".$data['jenis_kelamin']."</td>";
                        echo "<td>".$data['prodi']."</td>";
                        echo "<td style='text-align: center'><a href='update.php?NIM=$data[NIM]' class='btn btn-warning btn-sm title='edit'><i class='bi bi-pencil-square'></i></a>"."<a href='delete.php?NIM=$data[NIM]' class='btn btn-danger btn-sm' title='hapus'><i class='bi bi-trash'></i></a></td></tr>";
                        $no++;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>