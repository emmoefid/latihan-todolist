<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar (hidden by default, show on toggle) -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white flex flex-col min-h-screen z-30 transform -translate-x-full transition-transform duration-200 ease-in-out">
        <div class="px-6 py-6 flex items-center space-x-2 border-b border-gray-800">
            <span class="text-2xl font-bold tracking-wide">Todolist Admin</span>
            <button id="closeSidebar" class="ml-auto text-gray-400 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <nav class="flex-1 px-4 py-6">
            <ul class="space-y-2">
                <li>
                    <a href="/admin/dashboard" class="flex items-center px-3 py-2 rounded bg-gray-800 font-semibold">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/tambah-tugas" class="flex items-center px-3 py-2 rounded hover:bg-gray-800 transition">
                        <span class="w-5 h-5 mr-2 text-blue-300">+</span>
                        Tambah Tugas
                    </a>
                </li>
                <li>
                    <a href="/admin/tambah-akun" class="flex items-center px-3 py-2 rounded hover:bg-gray-800 transition">
                        <span class="w-5 h-5 mr-2 text-blue-300">+</span>
                        Tambah Akun
                    </a>
                </li>
                <li>
                    <a href="/admin/tambah-pegawai" class="flex items-center px-3 py-2 rounded hover:bg-gray-800 transition">
                        <span class="w-5 h-5 mr-2 text-blue-300">+</span>
                        Tambah Pegawai
                    </a>
                </li>
            </ul>
        </nav>
        <form action="{{ route('logout') }}" method="POST" class="px-4 pb-6">
            @csrf
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded font-semibold">Logout</button>
        </form>
    </aside>
    <!-- Overlay for sidebar -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden"></div>
    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 min-h-screen">
        <!-- Topbar -->
        <div class="flex items-center justify-between px-8 py-6 bg-white shadow">
            <div class="flex items-center space-x-4">
                <button id="openSidebar" class="text-gray-600 hover:text-indigo-600 focus:outline-none mr-2">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="text-xl font-bold text-gray-700">Dashboard</div>
            </div>
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search" class="px-4 py-2 rounded bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-200">
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                    <img src="https://i.pravatar.cc/100?img=3" alt="profile" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        <!-- Cards -->
        <div class="bg-indigo-500 py-10 px-8">
            <div class="flex flex-wrap gap-6 justify-between max-w-5xl mx-auto">
                <div class="bg-white rounded-lg shadow p-6 flex-1 min-w-[200px]">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 p-2 rounded">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4a4 4 0 014 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                        </div>
                        <div>
                            <div class="text-gray-500 text-sm">Pegawai</div>
                            <div class="text-2xl font-bold text-gray-800">{{ $pegawaiCount ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex-1 min-w-[200px]">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 p-2 rounded">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                        </div>
                        <div>
                            <div class="text-gray-500 text-sm">Tugas Aktif</div>
                            <div class="text-2xl font-bold text-gray-800">{{ $tugasAktif ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex-1 min-w-[200px]">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 p-2 rounded">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path stroke-linecap="round" stroke-linejoin="round" d="M8 12l2 2 4-4"></path></svg>
                        </div>
                        <div>
                            <div class="text-gray-500 text-sm">Tugas Selesai</div>
                            <div class="text-2xl font-bold text-gray-800">{{ $tugasSelesai ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 flex-1 min-w-[200px]">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 p-2 rounded">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01"></path></svg>
                        </div>
                        <div>
                            <div class="text-gray-500 text-sm">Akun</div>
                            <div class="text-2xl font-bold text-gray-800">{{ $akunCount ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Active Projects Table -->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Daftar Tugas Aktif</h2>
                    <a href="/admin/tambah-tugas" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded font-semibold transition">Create New Task</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama Tugas</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pegawai</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu Mulai</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu Selesai</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tugas Dari</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($tugasAktifList ?? [] as $tugas)
                            <tr>
                                <td class="px-4 py-2">{{ $tugas->tugas }}</td>
                                <td class="px-4 py-2">{{ $tugas->tugas_untuk }}</td>
                                <td class="px-4 py-2">{{ $tugas->waktu_mulai }}</td>
                                <td class="px-4 py-2">{{ $tugas->waktu_selesai }}</td>
                                <td class="px-4 py-2">
                                    @if($tugas->status == 'dikerjakan')
                                        <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Dikerjakan</span>
                                    @elseif($tugas->status == 'belum dikerjakan')
                                        <span class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">Belum Dikerjakan</span>
                                    @elseif($tugas->status == 'ditolak')
                                        <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Ditolak</span>
                                    @else
                                        <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">{{ $tugas->status }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="/admin/detail-tugas/{{ $tugas->id }}" class="text-indigo-600 hover:underline font-semibold">Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-6">Tidak ada tugas aktif.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    </script>
</body>
</html>