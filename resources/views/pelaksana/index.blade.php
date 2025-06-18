<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Dashboard Pelaksana - Daftar Tugas</title>
</head>
<body class="bg-gray-100 min-h-screen">
    @if(session('success'))
        <div class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50">
            <div class="bg-green-500 text-white px-6 py-3 rounded shadow-lg flex items-center space-x-2 animate-fade-in-down">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('.fixed.top-6').style.display = 'none';
            }, 3000);
        </script>
        <style>
            @keyframes fade-in-down {
                0% { opacity: 0; transform: translateY(-20px);}
                100% { opacity: 1; transform: translateY(0);}
            }
            .animate-fade-in-down {
                animation: fade-in-down 0.5s;
            }
        </style>
    @endif
    <div class="flex flex-col items-center py-10">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-2xl p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                        Dashboard Pelaksana
                    </span>
                    <h2 class="text-3xl font-bold text-gray-800 mt-2">Daftar Tugas</h2>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition font-semibold">Logout</button>
                </form>
            </div>
            <div class="overflow-x-auto rounded-lg shadow">
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
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ ++$i }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->id_pegawai }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->id_todo }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->tugas }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->waktu_mulai }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->waktu_selesai }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->tugas_dari }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->tugas_untuk }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $todo->keterangan }}</td>
                            <td class="px-4 py-3">
                                <form action="/pelaksana/ubah-status/{{ $todo->id_todo }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="block w-full px-2 py-1 border border-gray-300 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold">
                                        <option value="belum dikerjakan" {{ isset($todo->status) && $todo->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                                        <option value="dikerjakan" {{ isset($todo->status) && $todo->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                                        <option value="ditolak" {{ isset($todo->status) && $todo->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    <div class="mt-1">
                                        @if($todo->status == 'belum dikerjakan')
                                            <span class="inline-block px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded-full">Belum Dikerjakan</span>
                                        @elseif($todo->status == 'dikerjakan')
                                            <span class="inline-block px-2 py-0.5 text-xs bg-green-100 text-green-800 rounded-full">Dikerjakan</span>
                                        @elseif($todo->status == 'ditolak')
                                            <span class="inline-block px-2 py-0.5 text-xs bg-red-100 text-red-800 rounded-full">Ditolak</span>
                                        @endif
                                    </div>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="/pelaksana/detail-tugas/{{ $todo->id_todo }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition font-semibold">Detail Tugas</a>
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