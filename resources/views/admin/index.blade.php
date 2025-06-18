<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Daftar Tugas</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
            <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                Dashboard Admin
            </span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Logout</button>
            </form>
        </div>
        <div class="flex space-x-4 mb-6">
            <a href="/admin/tambah-tugas" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Tugas</a>
            <a href="/admin/tambah-akun" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Akun</a>
            <a href="/admin/tambah-pegawai" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">Tambah Pegawai</a>
        </div>
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Daftar Tugas</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Id Pegawai</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Id Todo</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tugas</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu Mulai</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu Selesai</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tugas Dari</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tugas Untuk</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                        @php $i=0; @endphp
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($dataTodo as $todo)
                        <tr>
                            <td class="px-4 py-2">{{ ++$i }}</td>
                            <td class="px-4 py-2">{{ $todo->id_pegawai }}</td>
                            <td class="px-4 py-2">{{ $todo->id_todo }}</td>
                            <td class="px-4 py-2">{{ $todo->tugas }}</td>
                            <td class="px-4 py-2">{{ $todo->waktu_mulai }}</td>
                            <td class="px-4 py-2">{{ $todo->waktu_selesai }}</td>
                            <td class="px-4 py-2">{{ $todo->tugas_dari }}</td>
                            <td class="px-4 py-2">{{ $todo->tugas_untuk }}</td>
                            <td class="px-4 py-2">{{ $todo->keterangan }}</td>
                            <td class="px-4 py-2">
                                @php
                                    $statusColors = [
                                        'dikerjakan' => 'bg-green-100 text-green-700',
                                        'belum dikerjakan' => 'bg-yellow-100 text-yellow-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ];
                                    $colorClass = $statusColors[$todo->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="inline-block px-2 py-1 rounded {{ $colorClass }}">
                                    {{ $todo->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="/admin/detail-tugas/{{ $todo->id_todo }}" class="text-blue-600 hover:underline">Detail</a>
                                <a href="/admin/ubah-tugas/{{ $todo->id_todo }}" class="text-yellow-600 hover:underline">Ubah</a>
                                <a href="/admin/hapus-tugas/{{ $todo->id_todo }}" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')" class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($dataTodo) == 0)
                    <div class="text-center text-gray-500 py-8">Tidak ada tugas.</div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>