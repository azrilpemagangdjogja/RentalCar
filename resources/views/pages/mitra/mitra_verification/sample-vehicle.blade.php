{{-- VEHICLE INTRO --}}
            <div
                class="relative mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                <div
                    class="absolute right-0 top-0 h-32 w-32 translate-x-12 -translate-y-12 rounded-full bg-gray-100 dark:bg-gray-600">
                </div>

                <div class="relative flex gap-4 p-5 sm:p-6">
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gray-800 text-white dark:bg-gray-50 dark:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75h7.5m-9.75-3h12a1.5 1.5 0 0 0 1.5-1.5V9.75a1.5 1.5 0 0 0-1.5-1.5h-12A1.5 1.5 0 0 0 4.5 9.75v4.5a1.5 1.5 0 0 0 1.5 1.5ZM6.75 8.25V6A2.25 2.25 0 0 1 9 3.75h6A2.25 2.25 0 0 1 17.25 6v2.25" />
                        </svg>
                    </div>

                    <div class="relative">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Kendaraan wajib untuk pengajuan Mitra
                        </h2>

                        <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            RentalCar perlu memastikan bahwa pengajuan Mitra memiliki kendaraan yang benar-benar
                            akan digunakan untuk layanan rental. Data kendaraan akan diperiksa sebelum pengajuan
                            dilanjutkan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
            
                {{-- VEHICLE INFORMATION --}}
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75h7.5m-9.75-3h12a1.5 1.5 0 0 0 1.5-1.5V9.75a1.5 1.5 0 0 0-1.5-1.5h-12A1.5 1.5 0 0 0 4.5 9.75v4.5a1.5 1.5 0 0 0 1.5 1.5ZM6.75 8.25V6A2.25 2.25 0 0 1 9 3.75h6A2.25 2.25 0 0 1 17.25 6v2.25" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                                    Informasi Kendaraan
                                </h2>

                                <p class="mt-1 text-sm leading-5 text-gray-500 dark:text-gray-400">
                                    Masukkan identitas dasar kendaraan yang akan didaftarkan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 p-5 sm:p-6">

                        {{-- BRAND + MODEL --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label for="brand"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Merek
                                </label>

                                <input type="text" name="brand" id="brand" value="{{ old('brand') }}"
                                    required placeholder="Contoh: Toyota"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('brand')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="model"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Model
                                </label>

                                <input type="text" name="model" id="model" value="{{ old('model') }}"
                                    required placeholder="Contoh: Avanza"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('model')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- TYPE + YEAR --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label for="type"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Jenis Kendaraan
                                </label>

                                <select name="type" id="type" required
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                                    <option value="">Pilih jenis kendaraan</option>
                                    <option value="Bicycle" {{ old('type') === 'Bicycle' ? 'selected' : '' }}>Sepeda
                                    </option>
                                    <option value="Bike" {{ old('type') === 'Bike' ? 'selected' : '' }}>Motor</option>
                                    <option value="Car" {{ old('type') === 'Car' ? 'selected' : '' }}>Mobil</option>
                                </select>

                                @error('type')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="year"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Tahun Kendaraan
                                </label>

                                <input type="number" name="year" id="year" value="{{ old('year') }}"
                                    required placeholder="Contoh: 2025"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('year')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- PLATE + COLOR --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label for="plate_number"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nomor Polisi
                                </label>

                                <input type="text" name="plate_number" id="plate_number"
                                    value="{{ old('plate_number') }}" required placeholder="Contoh: B 1234 ABC"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('plate_number')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="color"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Warna
                                </label>

                                <input type="text" name="color" id="color" value="{{ old('color') }}"
                                    placeholder="Contoh: Hitam"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('color')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>

                {{-- SPECIFICATION --}}
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
                    <div class="border-b border-gray-200 p-5 dark:border-gray-600 sm:p-6">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white">
                            Spesifikasi Kendaraan
                        </h2>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Lengkapi spesifikasi kendaraan untuk membantu calon penyewa mengetahui kendaraan yang tersedia.
                        </p>
                    </div>

                    <div class="space-y-5 p-5 sm:p-6">

                        {{-- FUEL + TRANSMISSION --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label for="fuel_type"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Bahan Bakar
                                </label>

                                <input type="text" name="fuel_type" id="fuel_type" value="{{ old('fuel_type') }}"
                                    placeholder="Contoh: Pertalite"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('fuel_type')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="transmission"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Transmisi
                                </label>

                                <select name="transmission" id="transmission"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-gray-300 dark:focus:ring-gray-300/10">
                                    <option value="">Pilih transmisi</option>
                                    <option value="Manual" {{ old('transmission') === 'Manual' ? 'selected' : '' }}>Manual
                                    </option>
                                    <option value="Automatic" {{ old('transmission') === 'Automatic' ? 'selected' : '' }}>
                                        Automatic</option>
                                </select>

                                @error('transmission')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- ENGINE + SEATS --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label for="engine_capacity"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Kapasitas Mesin
                                </label>

                                <input type="text" name="engine_capacity" id="engine_capacity"
                                    value="{{ old('engine_capacity') }}" placeholder="Contoh: 1500 cc"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('engine_capacity')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="seats"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Jumlah Kursi
                                </label>

                                <input type="number" name="seats" id="seats" value="{{ old('seats') }}"
                                    placeholder="Contoh: 7"
                                    class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">

                                @error('seats')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- DESCRIPTION --}}
                        <div>
                            <label for="description"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Deskripsi
                            </label>

                            <textarea name="description" id="description" rows="4"
                                placeholder="Tambahkan informasi lain mengenai kendaraan..."
                                class="w-full resize-none rounded-xl border border-gray-300 bg-gray-50 px-4 py-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-gray-800 focus:bg-white focus:ring-2 focus:ring-gray-800/10 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-gray-300 dark:focus:ring-gray-300/10">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- APPROVAL NOTICE --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-600 dark:bg-gray-700 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-gray-700 dark:bg-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m6.75 2.25a9.75 9.75 0 1 1-19.5 0 9.75 9.75 0 0 1 19.5 0Z" />
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-sm font-semibold text-gray-800 dark:text-white">
                                Setelah kendaraan dikirim
                            </h2>

                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                                Data kendaraan akan masuk ke proses pemeriksaan admin. Kamu belum perlu
                                mengaktifkan kendaraan secara manual. Kendaraan akan dapat digunakan setelah proses
                                verifikasi selesai.
                            </p>
                        </div>
                    </div>
                </div>


            </div>