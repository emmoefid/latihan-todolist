<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6 text-blue-700">Tambah Tugas</h1>
        <div class="mb-4 text-center">
            <a href="/admin/halaman-admin" class="text-blue-600 hover:underline text-sm">&larr; Kembali ke halaman Admin</a>
        </div>
        <form action="/admin/tambah-tugas-baru" method="post" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Nama Tugas</label>
                <input type="text" name="tugas" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block font-semibold mb-1 text-gray-700">Waktu Mulai</label>
                    <input type="date" name="waktu_mulai" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                </div>
                <div class="flex-1">
                    <label class="block font-semibold mb-1 text-gray-700">Waktu Selesai</label>
                    <input type="date" name="waktu_selesai" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                </div>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tugas Dari</label>
                <select name="tugas_dari" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                    @foreach ($pemberiTugass as $pemberiTugas)
                        <option value="{{ $pemberiTugas->id}}">{{ $pemberiTugas->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tugas Untuk</label>
                <select name="tugas_untuk" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200" required>
                    @foreach ($pelaksanaTugass as $pelaksanaTugas)
                        <option value="{{ $pelaksanaTugas->id}}">{{ $pelaksanaTugas->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-200">
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