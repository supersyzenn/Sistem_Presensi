<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Tambah Pengguna
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.pengguna.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <!-- Nama -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Nama Lengkap</span>
                                <input type="text" name="name"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    value="{{ old('name') }}" required>
                            </label>
                            @error('name')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Username</span>
                                <input type="text" name="username"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    value="{{ old('username') }}" required>
                            </label>
                            @error('username')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Email</span>
                                <input type="email" name="email"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    value="{{ old('email') }}" required>
                            </label>
                            @error('email')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Password</span>
                                <input type="password" name="password"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    required>
                            </label>
                            @error('password')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Konfirmasi Password</span>
                                <input type="password" name="password_confirmation"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    required>
                            </label>
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Role</span>
                                <select name="role" id="role"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal">
                                    <option value="admin">Admin</option>
                                    <option value="user">Guru</option>
                                </select>
                            </label>
                            @error('role')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Jenis Kelamin</span>
                                <select name="jenis_kelamin"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </label>
                            @error('jenis_kelamin')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIP (akan ditampilkan/disembunyikan berdasarkan role) -->
                        <div id="nip-field" style="display: none;">
                            <label class="block text-sm">
                                <span class="text-gray-700">NIP</span>
                                <input type="text" name="nip"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    value="{{ old('nip') }}">
                            </label>
                            @error('nip')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Foto</span>
                                <input type="file" name="foto"
                                    class="block w-full mt-1 text-sm border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    accept="image/*">
                            </label>
                            @error('foto')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('admin.pengguna.index') }}"
                            class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg focus:outline-none focus:shadow-outline-gray">
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-3 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script untuk menampilkan/menyembunyikan field NIP berdasarkan role
        document.getElementById('role').addEventListener('change', function() {
            const nipField = document.getElementById('nip-field');
            const nipInput = document.querySelector('input[name="nip"]');

            if (this.value === 'user') {
                nipField.style.display = 'block';
                nipInput.required = true;
            } else {
                nipField.style.display = 'none';
                nipInput.required = false;
            }
        });

        // Trigger change event pada load untuk set initial state
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            if (roleSelect.value === 'user') {
                document.getElementById('nip-field').style.display = 'block';
                document.querySelector('input[name="nip"]').required = true;
            }
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 1500,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: "#3085d6",
            });
        </script>
    @endif
</x-layoutadmin>
