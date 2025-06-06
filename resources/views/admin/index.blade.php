<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
</head>
<body>
    <center>
    <table border="1" cellpadding="10" cellspacing="0">
        <caption>
            <h2>Daftar Tugas</h2>
        </caption>
        <br>
        <a href="/admin/tambah-tugas">Tambah Tugas</a>
        <thead>
            <tr>
                <td>Id Pegawai</td>
                <td>Id Todo</td>
                <td>Tugas</td>
                <td>Waktu Mulai</td>
                <td>Waktu Selesai</td>
                <td>Tugas Dari</td>
                <td>Tugas Untuk</td>
                <td>Keterangan</td>
                <td>Status</td>
                <td><center>Aksi</center></td>
            </tr>
            @php
                $i=0;
            @endphp
        </thead>
        <tbody>
            @foreach ($dataTodo as $todo)
            <tr>
                <td>{{ $todo->id_pegawai }}</td>
                <td>{{ $todo->id_todo }}</td>
                <td>{{ $todo->tugas }}</td>
                <td>{{ $todo->waktu_mulai }}</td>
                <td>{{ $todo->waktu_selesai }}</td>
                <td>{{ $todo->tugas_dari }}</td>
                <td>{{ $todo->tugas_untuk }}</td>
                <td>{{ $todo->keterangan }}</td>
                <td>{{ $todo->status }}</td>
                <td>
                    <a href="/admin/detail-tugas/{{ $todo->id_todo }}">Detail Tugas</a> | 
                    <a href="/admin/hapus-tugas/{{ $todo->id_todo }}">Hapus</a> |
                    <a href="/admin/ubah-tugas/{{ $todo->id_todo }}">Ubah Tugas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
</body>
</html>