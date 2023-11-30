<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
</style>
<body>
<style>
    body {
        background-image: url('./unnes.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        background: #ededed;
    }
</style>
<?php
require 'koneksi.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $query = "SELECT * FROM mahasiswa WHERE email = '$email' AND password_mahasiswa = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $mahasiswa = $result->fetch_assoc();
        $namaMahasiswa = $mahasiswa['nama_mhs'];
        header('Location: mahasiswa.php?nama_mhs='.$namaMahasiswa.'');
        exit();
    } else {
        $message = 'Email atau password salah.';
    }
} else {
    $message = '';
}
?>


<div class="container mt-5">
    <div class="flex justify-center">
        <div class="w-96">
            <div class="bg-slate-100 shadow-md rounded-md p-4">
                <div class=" text-slate-300 text-center py-2 mb-4 rounded-md">
                    <h2 class="text-lg font-semibold text-black">Login</h2>
                </div>
                <form action="index.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" id="email" class="w-full mt-1 p-2 border-2 border-slate-400 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" name="password" id="password" class="w-full mt-1 p-2  border-2 border-slate-400 rounded-md" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Login</button>
                    <?php if (!empty($message)): ?>
                        <div class="mt-3 text-red-500"><?php echo $message; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
