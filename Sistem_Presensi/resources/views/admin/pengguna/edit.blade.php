<x-layoutadmin>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Edit Pengguna
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.pengguna.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6 mb-4 md:grid-cols-2">
                        <!-- Nama -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Nama Lengkap</span>
                                <input type="text" name="name"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                    value="{{ old('name', $user->name) }}" required>
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
                                    value="{{ old('username', $user->username) }}" required>
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
                                    value="{{ old('email', $user->email) }}" required>
                            </label>
                            @error('email')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password (Optional) -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</span>
                                <input type="password" name="password"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal">
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
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal">
                            </label>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Jenis Kelamin</span>
                                <select name="jenis_kelamin"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal">
                                    <option value="Laki-laki"
                                        {{ ($user->role === 'admin' ? $user->adminDetail->jenis_kelamin : $user->guruDetail->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ ($user->role === 'admin' ? $user->adminDetail->jenis_kelamin : $user->guruDetail->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </label>
                            @error('jenis_kelamin')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($user->role === 'user')
                            <!-- NIP (hanya untuk guru) -->
                            <div>
                                <label class="block text-sm">
                                    <span class="text-gray-700">NUPTK</span>
                                    <input type="text" name="nip"
                                        class="block w-full mt-1 text-sm rounded-lg border-gray-300 focus:border-teal-400 focus:outline-none focus:shadow-outline-teal"
                                        value="{{ old('nip', $user->guruDetail->nip) }}" required>
                                </label>
                                @error('nip')
                                    <span class="text-xs text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <!-- Role (disabled/readonly) -->
                        <div>
                            <label class="block text-sm">
                                <span class="text-gray-700">Role</span>
                                <input type="text" value="{{ ucfirst($user->role) }}"
                                    class="block w-full mt-1 text-sm rounded-lg border-gray-300 bg-gray-50" disabled>
                            </label>
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
                            <!-- Preview foto saat ini -->
                            @if ($user->role === 'admin' && $user->adminDetail->foto)
                                <img src="{{ asset('storage/profile/' . $user->adminDetail->foto) }}"
                                    class="mt-2 h-20 w-20 object-cover rounded-full" alt="Foto profil">
                            @elseif($user->role === 'user' && $user->guruDetail->foto)
                                <img src="{{ asset('storage/profile/' . $user->guruDetail->foto) }}" class="mt-2 h-20 w-20 object-cover rounded-full"
                                    alt="Foto profil">
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('admin.pengguna.index') }}"
                            class="px-6 py-3 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200">
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-3 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layoutadmin>
