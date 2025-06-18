<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penugasan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6 text-blue-700">Informasi Penugasan</h1>
        <table class="w-full text-left mb-6">
            <tbody>
                <tr>
                    <td class="py-2 font-semibold w-1/3">Tugas</td>
                    <td class="py-2">{{ $detailTodo->tugas }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="py-2 font-semibold">Waktu Ditugaskan</td>
                    <td class="py-2">{{ $detailTodo->waktu_mulai }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Waktu Selesai</td>
                    <td class="py-2">{{ $detailTodo->waktu_selesai }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="py-2 font-semibold">Tugas Dari</td>
                    <td class="py-2">{{ $detailTodo->tugas_dari }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Tugas Untuk</td>
                    <td class="py-2">{{ $detailTodo->tugas_untuk }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="py-2 font-semibold">Keterangan</td>
                    <td class="py-2">{{ $detailTodo->keterangan }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Status</td>
                    <td class="py-2">
                        <span class="px-3 py-1 rounded-full 
                            @if($detailTodo->status == 'belum dikerjakan') bg-yellow-200 text-yellow-800 
                            @elseif($detailTodo->status == 'dikerjakan') bg-green-200 text-green-800 
                            @elseif($detailTodo->status == 'ditolak') bg-red-200 text-red-800 
                            @else bg-gray-200 text-gray-800 @endif">
                            {{ $detailTodo->status }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="/ceo/index"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">
                Kembali ke Daftar Tugas
            </a>
        </div>
    </div>
</body>
</html>