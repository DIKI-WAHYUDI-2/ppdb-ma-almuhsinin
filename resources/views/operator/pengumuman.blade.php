<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengumuman - Dashboard Operator</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out"
        id="sidebar">
        <div class="flex items-center justify-center h-16 bg-blue-600">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-blue-600"></i>
                </div>
                <span class="text-white font-bold text-lg">MA Al-Muhsinin</span>
            </div>
        </div>

        <nav class="mt-8">
            <div class="px-4 space-y-2">
                <a href="{{ route('operator.dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('pengumuman.index') }}"
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
                    <i class="fas fa-bullhorn mr-3"></i>
                    Pengumuman
                </a>
                <a href="{{ route('soal.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-file-alt mr-3"></i>
                    Soal
                </a>
                <a href="{{ route('operator.verifikasi') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-check-circle mr-3"></i>
                    Verifikasi Berkas
                </a>
                <a href="{{ route('operator.kelulusan') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Kelulusan
                </a>
                <a href="{{ route('jadwal.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-calendar-days mr-3"></i>
                    Jadwal PPDB
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <button class="lg:hidden text-gray-600 hover:text-gray-900 mr-4" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-900">Kelola Pengumuman</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <button onclick="openCreateModal()"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Buat Pengumuman
                    </button>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6">
            <!-- Filter & Search - Optimized -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <form method="GET" action="{{ route('pengumuman.index') }}"
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari pengumuman..."
                                value="{{ request('search') }}"
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <select name="status"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non-aktif
                            </option>
                        </select>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search mr-2"></i>Cari
                        </button>
                        @if(request('search') || request('status'))
                            <a href="{{ route('pengumuman.index') }}"
                                class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-times mr-2"></i>Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Pengumuman List -->
            <div class="space-y-4">
                <!-- Pengumuman Item 1 -->
                @foreach ($pengumuman as $item)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $item->judul }}</h3>
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">{{ $item->status }}</span>
                                </div>
                                <p class="text-gray-600 mb-3">{{ $item->isi }}</p>
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span><i
                                            class="fas fa-calendar mr-1"></i>{{ date('d F Y', strtotime($item->created_at)) }}
                                    </span>
                                    <span><i class="fas fa-eye mr-1"></i>1,245 views</span>
                                    <span><i class="fas fa-user mr-1"></i>Operator Sekolah</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 ml-4">
                                <button onclick="editPengumuman({{ $item->id }})"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deletePengumuman({{ $item->id }})"
                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- Pagination - Dynamic -->
            @if($pengumuman->hasPages())
                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">{{ $pengumuman->firstItem() }}</span> sampai
                        <span class="font-medium">{{ $pengumuman->lastItem() }}</span> dari
                        <span class="font-medium">{{ $pengumuman->total() }}</span> pengumuman
                    </div>
                    <div class="flex items-center space-x-2">
                        {{ $pengumuman->appends(request()->query())->links() }}
                    </div>
                </div>
            @endif
        </main>
    </div>

    <!-- Create/Edit Modal -->
    <div id="pengumumanModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeModal()"></div>

            <div
                class="inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900" id="modalTitle">Buat Pengumuman Baru</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form id="pengumumanForm" method="POST" class="space-y-6" action="{{ route('pengumuman.store') }}">
                    @csrf
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Pengumuman</label>
                        <input type="text" id="judul" name="judul" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan judul pengumuman">
                    </div>

                    <div>
                        <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Pengumuman</label>
                        <textarea id="isi" name="isi" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                            placeholder="Tulis isi pengumuman..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="status" name="status" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="draft">Draft</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non-aktif</option>
                            </select>
                        </div>

                        <div>
                            <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                Publikasi</label>
                            <input type="datetime-local" id="tanggal_publikasi" name="tanggal_publikasi"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <button type="button" onclick="closeModal()"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        function openCreateModal() {
            document.getElementById('modalTitle').textContent = 'Buat Pengumuman Baru';
            const form = document.getElementById('pengumumanForm');
            form.reset();
            form.action = `{{ route('pengumuman.store') }}`;

            // Hapus method PUT jika sebelumnya edit
            const oldMethod = document.getElementById('methodField');
            if (oldMethod) oldMethod.remove();

            document.getElementById('pengumumanModal').classList.remove('hidden');
        }

        function editPengumuman(id) {
            // 1. Tampilkan modal dulu
            document.getElementById('modalTitle').textContent = 'Edit Pengumuman';
            const form = document.getElementById('pengumumanForm');
            form.reset();
            form.action = `{{ url('operator/pengumuman') }}/${id}`;

            // Tambahkan/ubah method menjadi PUT
            if (!document.getElementById('methodField')) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                methodInput.id = 'methodField';
                form.appendChild(methodInput);
            }

            // Tampilkan modal
            document.getElementById('pengumumanModal').classList.remove('hidden');

            // 2. Tampilkan loading sementara
            form.judul.value = 'Memuat...';
            form.isi.value = '';
            form.status.value = 'draft';
            form.tanggal_publikasi.value = '';

            // 3. Fetch data dari server
            fetch(`{{ url('operator/pengumuman') }}/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data pengumuman!');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const item = data.data;

                        // Isi nilai form setelah data tersedia
                        form.judul.value = item.judul;
                        form.isi.value = item.isi;
                        form.status.value = item.status;
                        form.tanggal_publikasi.value = item.tanggal_publikasi
                            ? item.tanggal_publikasi.replace(' ', 'T')
                            : '';
                    } else {
                        showToast('Gagal mengambil data!', 'error');
                    }
                })
                .catch(error => {
                    console.error(error);
                    showToast('Terjadi kesalahan saat mengambil data!', 'error');
                });
        }



        function deletePengumuman(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')) {
                // Kirim request DELETE ke server
                fetch(`{{ url('operator/pengumuman') }}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            // Refresh halaman untuk melihat perubahan
                            location.reload();
                        } else {
                            alert('Gagal menghapus pengumuman!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghapus pengumuman!');
                    });
            }
        }

        function closeModal() {
            document.getElementById('pengumumanModal').classList.add('hidden');
        }

        // Form submission handler
        document.getElementById('pengumumanForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            const submitButton = form.querySelector('button[type="submit"]');

            // Disable tombol submit agar tidak bisa diklik berulang
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';

            const formData = new FormData(form);
            const isEdit = document.getElementById('methodField') !== null;
            const url = form.action;

            // Konversi FormData ke object untuk JSON
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            // Kirim request ke server
            fetch(url, {
                method: 'POST', // tetap POST, _method di-handle oleh Laravel
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                        closeModal();
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan saat menyimpan pengumuman!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast(error.message, 'error');

                    // Aktifkan kembali tombol submit jika terjadi error
                    submitButton.disabled = false;
                    submitButton.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan';
                });
        });


        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' ? 'fa-check' : 'fa-exclamation-triangle';

            toast.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            toast.innerHTML = `<i class="fas ${icon} mr-2"></i>${message}`;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }
    </script>
</body>

</html>