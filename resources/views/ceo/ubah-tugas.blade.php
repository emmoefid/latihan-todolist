<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Tugas</title>
</head>
<body>
    <center>
        <h1>Ubah Tugas</h1>
        <h3><a href="/ceo/index">Kembali ke daftar tugas</a></h3>
    <form action="/ceo/simpan-ubah-tugas/{{ $dataTodo->id }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Tugas :</td>
                <td><input type="text" name="tugas" value="{{ $dataTodo->tugas }}"></td>
            </tr>
            <tr>
                <td>Waktu Mulai :</td>
                <td><input type="date" name="waktu_mulai" value="{{ \Carbon\Carbon::parse($dataTodo->waktu_mulai)->format('Y-m-d') }}"></td>
            </tr>
            <tr>
                <td>Waktu Selesai :</td>
                <td><input type="date" name="waktu_selesai" value="{{ \Carbon\Carbon::parse($dataTodo->waktu_selesai)->format('Y-m-d') }}"></td>
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
                <td><input type="text" name="keterangan" value="{{ $dataTodo->keterangan }}"></td>
            </tr>
            <tr>
                <td>Status :</td>
                <td>
                    <select name="status">
                        <option value="belum dikerjakan" {{ isset($dataTodo->status) && $dataTodo->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                        <option value="dikerjakan" {{ isset($dataTodo->status) && $dataTodo->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                        <option value="ditolak" {{ isset($dataTodo->status) && $dataTodo->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>