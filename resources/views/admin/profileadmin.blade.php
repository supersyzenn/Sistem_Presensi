<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-sm mx-auto mt-10 bg-white rounded-lg shadow-lg">
        <!-- Header Section -->
        <div class="flex justify-between items-center p-4 bg-gray-100 rounded-t-lg border-b">
            <h2 class="text-lg font-semibold text-teal-600">PROFILE</h2>
            <div class="relative flex items-center space-x-2">
                <!-- Edit Icon with Dropdown for Password Change -->
                <div class="relative">
                    <button type="button" class="p-2 text-gray-500 hover:text-gray-700" id="edit-button">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 0 1 0 2.828l-9 9a2 2 0 0 1-.707.414l-4 1a1 1 0 0 1-1.261-1.262l1-4a2 2 0 0 1 .414-.707l9-9a2 2 0 0 1 2.828 0Z" />
                            <path d="M16 6l-2-2" />
                        </svg>
                    </button>
                    <!-- Edit Password Form Dropdown -->
                    <div class="absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-lg p-4 border hidden z-50" id="password-form">
                        <h3 class="text-lg font-semibold text-teal-600 mb-2">Edit Password</h3>
                        <form action="{{ route('admin.profile.update-password') }}" method="POST">
                            @csrf
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-gray-500 text-sm">Password Lama</label>
                                    <input type="password" name="old_password" class="w-full p-2 border rounded-lg"
                                        placeholder="Masukkan password lama" required>
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-sm">Password Baru</label>
                                    <input type="password" name="password" class="w-full p-2 border rounded-lg"
                                        placeholder="Masukkan password baru" required>
                                </div>
                                <div>
                                    <label class="block text-gray-500 text-sm">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="w-full p-2 border rounded-lg"
                                        placeholder="Konfirmasi password baru" required>
                                </div>

                                <button type="submit" class="w-full bg-teal-500 text-white p-2 rounded-lg mt-4 hover:bg-teal-600">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Body Section -->
        <div class="p-4">
            <!-- Profile Image Section -->
            <div class="flex items-center mb-4 relative">
                <div class="w-24 h-24 bg-teal-500 rounded-lg relative flex justify-center items-center overflow-hidden">
                    <img src="{{ $adminDetail && $adminDetail->foto ? asset('img/' . $adminDetail->foto) : asset('img/default.jpg') }}"
                        alt="Profile Photo" class="w-full h-full object-cover" />
                </div>

                <!-- Profile Info Section -->
                <div class="ml-4">
                    <p class="text-gray-500">Nama Lengkap</p>
                    <p class="font-bold text-lg">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!-- Additional Info Section -->
            <div class="space-y-2">
                <div>
                    <p class="text-gray-500">Jenis Kelamin</p>
                    <p class="font-semibold text-gray-800">{{ $adminDetail ? $adminDetail->jenis_kelamin : '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Jabatan</p>
                    <p class="font-semibold text-gray-800">{{ $adminDetail ? $adminDetail->jabatan : '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Toggle password form
        const editButton = $('#edit-button');
        const passwordForm = $('#password-form');

        // Toggle form when edit button is clicked
        editButton.click(function(e) {
            e.stopPropagation();
            passwordForm.toggleClass('hidden');
        });

        // Close form when clicking outside
        $(document).click(function(e) {
            if (!passwordForm.is(e.target) &&
                passwordForm.has(e.target).length === 0 &&
                !editButton.is(e.target)) {
                passwordForm.addClass('hidden');
            }
        });

        // Form submission handler
        $('#password-form form').submit(function(e) {
            e.preventDefault();

            // Get password values
            const password = $('input[name="password"]').val();
            const passwordConfirmation = $('input[name="password_confirmation"]').val();

            // Check if passwords match
            if (password !== passwordConfirmation) {
                Swal.fire({
                    title: "Gagal!",
                    text: "Password baru dan konfirmasi tidak sama",
                    icon: "error",
                });
                return false;
            }

            // Submit form if validation passes
            const form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    if(response.success) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            passwordForm.addClass('hidden');
                            form.reset();
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Gagal!",
                        text: xhr.responseJSON.message || "Password lama tidak sesuai",
                        icon: "error"
                    });
                }
            });
        });
    });
</script>

</x-layoutadmin>
