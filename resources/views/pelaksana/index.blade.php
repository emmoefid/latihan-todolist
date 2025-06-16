<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
</head>
<body>
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <center>
    <table border="1" cellpadding="10" cellspacing="0">
        <caption>
            <h2>Daftar Tugas</h2>
        </caption>
        <br>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
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
                <td>
                    <form action="/pelaksana/ubah-status/{{ $todo->id_todo }}" method="POST">
                        @csrf
                        <select name="status" onchange="this.form.submit()">
                            <option value="belum dikerjakan" {{ isset($todo->status) && $todo->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                            <option value="dikerjakan" {{ isset($todo->status) && $todo->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                            <option value="ditolak" {{ isset($todo->status) && $todo->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="/pelaksana/detail-tugas/{{ $todo->id_todo }}">Detail Tugas</a> 
                </td>       
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
</body>
</html>