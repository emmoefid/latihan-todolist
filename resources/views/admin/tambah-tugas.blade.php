<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
</head>
<body>
    <center>
        <h1>Tambah Tugas</h1>
        <h3><a href="/admin/index">Kembali ke halaman Admin</a></h3>
    <form action="/admin/tambah-tugas-baru" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Tugas :</td>
                <td><input type="text" name="tugas"></td>
            </tr>
            <tr>
                <td>Waktu Mulai :</td>
                <td><input type="date" name="waktu_mulai"></td>
            </tr>
            <tr>
                <td>Waktu Selesai :</td>
                <td><input type="date" name="waktu_selesai"></td>
            </tr>
            <tr>
                <td>Tugas Dari :</td>
                <td>
                    <select name="tugas_dari">
                    @foreach ($pemberiTugass as $pemberiTugas)
                        <option value="{{ $pemberiTugas->id}}">{{ $pemberiTugas->nama}}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tugas Untuk :</td>
                <td>
                    <select name="tugas_untuk">
                    @foreach ($pelaksanaTugass as $pelaksanaTugas)
                        <option value="{{ $pelaksanaTugas->id}}">{{ $pelaksanaTugas->nama}}</option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td>Keterangan :</td>
                <td><input type="text" name="keterangan"></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
        </table>
    </form>
</body>
</html>