<div>
    <div class="flex p-20 justify-center w-full">
        <form class="w-full shadow-xl p-10 rounded-xl bg-white border" wire:submit.prevent="save">
            <h1 class="font-semibold text-lg my-5">

                Edit Mata Kuliah
            </h1>
            <!-- Mata Kuliah -->
            <div class="mb-5">
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                    Kuliah</label>
                <input type="text" id="course_name" wire:model="course_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Mata Kuliah" required />
                @error('course_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kode Mata Kuliah -->
            <div class="mb-5">
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata
                    Kuliah</label>
                <input type="text" id="code" wire:model="course_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kode Mata Kuliah" required />
                @error('course_code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Semester -->
            <div class="mb-5">
                <label for="semester"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                <select wire:model='semester'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @for ($i = 0; $i < 9; $i++)
                        <option value="{{ $i }}"> {{ $i === 0 ? 'Pilihan' : $i }}</option>
                    @endfor
                </select>
                @error('semester')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- SKS -->
            <div class="mb-5">
                <label for="sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                <input type="number" id="sks" wire:model="sks"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah SKS" required />
                @error('sks')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kelas -->
            <div class="mb-5">
                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                <input type="text" id="class" wire:model="class"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Kelas" required />
                @error('class')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Program Studi -->
            <div class="mb-5">
                <label for="studyprogram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                    Studi</label>
                <input type="text" id="studyprogram" wire:model="studyprogram"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Program Studi" required />
                @error('studyprogram')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</div>
