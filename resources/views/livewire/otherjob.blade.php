<div>
    <div class="flex p-20 justify-center w-full">
        <form class="w-full shadow-xl p-10 rounded-xl bg-white border" wire:submit.prevent="save">
            <h1 class="font-semibold text-lg my-5">
                {{ $isEdit ? 'Edit' : 'Tambah' }} Tugas
            </h1>

            <!-- Field Nama -->
            <div class="mb-5">
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="course_name" wire:model.defer="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Tugas" required />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Field SKS -->
            <div class="mb-5">
                <label for="course_sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                <input type="number" id="course_sks" wire:model.defer="sks"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah SKS" required />
                @error('sks')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50"
                wire:loading.attr="disabled">
                Simpan
            </button>

            <!-- Indikator Loading (Opsional) -->
            <div wire:loading class="mt-2 text-blue-500 text-sm">
                Memproses...
            </div>
        </form>
    </div>
</div>
