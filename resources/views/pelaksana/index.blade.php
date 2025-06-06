<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Modal Notifikasi TailwindCSS -->
    @if(session('success'))
    <div id="modal-success" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-80 text-center">
            <div class="text-green-600 text-2xl mb-2">✔️</div>
            <div class="mb-4 text-lg font-semibold">{{ session('success') }}</div>
            <button onclick="document.getElementById('modal-success').style.display='none'"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                OK
            </button>
        </div>
    </div>
    @endif

    <div class="container mx-auto mt-10">
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Daftar Tugas</h2>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="text-left">
                        <th class="py-2 px-4 border-b">Id Pegawai</th>
                        <th class="py-2 px-4 border-b">Id Todo</th>
                        <th class="py-2 px-4 border-b">Tugas</th>
                        <th class="py-2 px-4 border-b">Waktu Mulai</th>
                        <th class="py-2 px-4 border-b">Waktu Selesai</th>
                        <th class="py-2 px-4 border-b">Tugas Dari</th>
                        <th class="py-2 px-4 border-b">Tugas Untuk</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b"><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataTodo as $todo)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $todo->id_pegawai }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->id_todo }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->tugas }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->waktu_mulai }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->waktu_selesai }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->tugas_dari }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->tugas_untuk }}</td>
                        <td class="py-2 px-4 border-b">{{ $todo->keterangan }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="/pelaksana/ubah-status/{{ $todo->id_todo }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="border rounded-md p-1">
                                    <option value="belum dikerjakan" {{ isset($todo->status) && $todo->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                                    <option value="dikerjakan" {{ isset($todo->status) && $todo->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                                    <option value="ditolak" {{ isset($todo->status) && $todo->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </form>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="/pelaksana/detail-tugas/{{ $todo->id_todo }}" class="text-blue-600 hover:underline">Detail Tugas</a> 
                        </td>       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>