<?php
require 'koneksi.php';

// Mengecek apakah parameter nama_mhs ada di URL
if (isset($_GET['nama_user'])) {
    $namaMahasiswa = $_GET['nama_user'];

    // Mengambil NIM berdasarkan nama mahasiswa
    $queryNIM = "SELECT NIM FROM mahasiswa WHERE nama_mhs = '$namaMahasiswa'";
    $resultNIM = mysqli_query($conn, $queryNIM);

    if ($resultNIM && $resultNIM->num_rows > 0) {
        $rowNIM = mysqli_fetch_assoc($resultNIM);
        $NIM = $rowNIM['NIM'];

        // Mengambil mata kuliah yang diambil oleh mahasiswa berdasarkan NIM
        $queryMataKuliah = "SELECT mk.* FROM mata_kuliah mk
                            JOIN mengambil_mk mmk ON mk.kode_mk = mmk.kode_mk
                            WHERE mmk.NIM = '$NIM'";

        $resultMataKuliah = mysqli_query($conn, $queryMataKuliah);

        if ($resultMataKuliah) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body class="bg-gray-200 p-0 m-0 flex items-center justify-center flex-col">
    <div class="p-3 bg-slate-700 text-slate-100 text-2xl flex w-full justify-between">
        <h2 class="font-bold text-start ml-3">Learning Management System</h2>
        <div class="flex items-center text-end">
            <i class="bi bi-person me-2 mb-2"></i>
            <h2 class="font-bold text-sm me-3"><?php echo $namaMahasiswa; ?></h2>
        </div>
    </div>
    <div class="matakuliah pt-10 flex justify-center flex-col">
        <h1 class="text-2xl font-bold text-center mb-10">Daftar Mata Kuliah</h1>
        <div class="flex justify-center flex-wrap items-stretch gap-4">
            <?php
                while ($data = mysqli_fetch_array($resultMataKuliah)) {
                    echo "<div class='mb-3 flex justify-center flex-wrap'>";
                    echo "<div class='bg-white p-4 rounded-md shadow-lg w-[300px] flex flex-col'>";
                    echo "<h5 class='text-xl font-bold mb-2'>".$data['nama_mk']."</h5>";
                    echo "<p class='text-gray-600 mb-5'>(".$data['kode_mk'].")</p>";
                    echo "<a href='mata-kuliah.php?kode_mk=".$data['kode_mk']."&nama_user=".urlencode($namaMahasiswa)."' class='bg-blue-500 text-white py-2 px-4 mt-auto rounded-md content-end'>Lihat Detail</a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php
        } else {
            echo "Gagal mengambil data mata kuliah: ".mysqli_error($conn);
        }
    } else {
        echo "Gagal mengambil NIM mahasiswa: ".mysqli_error($conn);
    }
} else {
    echo "Nama Mahasiswa tidak ditemukan.";
}
?>
