<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
</head>
<body>
    <h3><a href="/admin/halaman-admin">Kembali ke halaman Admin</a></h3>
    <center>
        <h1>Tambah Akun</h1>
            <form action="{{ route('simpan-akun-baru') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td><label for="nama">Nama:</label></td>
                        <td><input type="text" id="nama" name="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="kata_sandi">Kata Sandi:</label></td>
                        <td><input type="password" id="kata_sandi" name="kata_sandi" required></td>
                    </tr>
                    <tr>
                        <td><label for="jabatan">Role:</label> </td>
                        <td>
                            <select id="jabatan" name="jabatan" required>
                                <option value="admin">Admin</option>
                                <option value="ceo">Ceo</option>
                                <option value="pelaksana">Pelaksana</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="no_hp">No HP:</label></td>
                        <td><input type="text" id="no_hp" name="no_hp" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit">Tambah Akun</button></td>
                    </tr>
                </table>
            </form>
    </center>
</body>
</html>