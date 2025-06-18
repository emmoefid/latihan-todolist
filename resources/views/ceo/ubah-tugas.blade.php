<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6 text-blue-700">Ubah Tugas</h1>
        <div class="mb-4 text-center">
            <a href="/ceo/index" class="text-blue-600 hover:underline text-sm">&larr; Kembali ke daftar tugas</a>
        </div>
        <form action="/ceo/simpan-ubah-tugas/{{ $dataTodo->id }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Nama Tugas</label>
                <input type="text" name="tugas" value="{{ $dataTodo->tugas }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block font-semibold mb-1 text-gray-700">Waktu Mulai</label>
                    <input type="date" name="waktu_mulai" value="{{ \Carbon\Carbon::parse($dataTodo->waktu_mulai)->format('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                </div>
                <div class="flex-1">
                    <label class="block font-semibold mb-1 text-gray-700">Waktu Selesai</label>
                    <input type="date" name="waktu_selesai" value="{{ \Carbon\Carbon::parse($dataTodo->waktu_selesai)->format('Y-m-d') }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                </div>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tugas Dari</label>
                <select name="tugas_dari" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                    @foreach ($pemberiTugass as $pemberiTugas)
                        <option value="{{ $pemberiTugas->id}}" {{ $dataTodo->tugas_dari == $pemberiTugas->id ? 'selected' : '' }}>{{ $pemberiTugas->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tugas Untuk</label>
                <select name="tugas_untuk" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                    @foreach ($pelaksanaTugass as $pelaksanaTugas)
                        <option value="{{ $pelaksanaTugas->id}}" {{ $dataTodo->tugas_untuk == $pelaksanaTugas->id ? 'selected' : '' }}>{{ $pelaksanaTugas->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" value="{{ $dataTodo->keterangan }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="belum dikerjakan" {{ isset($dataTodo->status) && $dataTodo->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                    <option value="dikerjakan" {{ isset($dataTodo->status) && $dataTodo->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                    <option value="ditolak" {{ isset($dataTodo->status) && $dataTodo->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>