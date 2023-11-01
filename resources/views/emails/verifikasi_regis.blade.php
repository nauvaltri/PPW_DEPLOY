<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Registrasi</title>
</head>

<body>
    <h1>Selamat Datang</h1>
    <p>Halo, {{ $data->name }},</p>
    <p>Akun mu telah sukses di buat.</p>
    <p>Berikut keteranganya :</p>
    <ul>
        <li><strong>Nama :</strong> {{ $data->name }}</li>
        <li><strong>Email :</strong> {{ $data->email }}</li>
    </ul>
    <p>Sekarang kamu sudah bisa login ke web kami dengan akun tersebut.</p>
</body>

</html>