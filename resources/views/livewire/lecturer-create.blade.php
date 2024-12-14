<div>
    <div class="flex p-20 justify-center w-full">
        <form class="w-full shadow-xl p-10 rounded-xl bg-white border" wire:submit.prevent="save">
            <h1 class="font-semibold text-lg my-5">

                Tambah Dosen
            </h1>
            <div class="mb-5">
                <label for="course_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="course_name" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama " required />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nip</label>
                <input type="text" id="code" wire:model="nip"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="NIP" required />
                @error('nip')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-5">
                <label for="sks"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan/Pangkat</label>
                <select type="text" id="sks" wire:model.live="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jabatan" required>
                    <option value="Lektor-III/c">Lektor III/c</option>
                    <option value="Lektor-III/d">Lektor III/d</option>
                    <option value="Lektor/XII">Lektor/XII</option>
                    <option value="Lektor Kepala-IV/a">Lektor Kepala IV/a</option>
                    <option value="Lektor Kepala-IV/b">Lektor Kepala IV/b</option>
                    <option value="Asisten Ahli-III/a">Asisten Ahli III/a</option>
                    <option value="Asisten Ahli-III/b">Asisten Ahli III/b</option>
                    <option value="Asisten Ahli/IX">Asisten Ahli/IX</option>
                    <option value="Asisten Ahli/X">Asisten Ahli/X</option>
                    <option value="Profesor-IV/c">Profesor IV/c</option>
                    <option value="Profesor-IV/d">Profesor IV/d</option>
                    <option value="Profesor-IV/e">Profesor IV/e</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="otherjob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tugas
                    Lain</label>
                <select id="otherjob" wire:model="otherjob_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="null">Tidak Ada</option>
                    @foreach ($otherjobs as $job)
                        <option value="{{ $job->id }}">{{ $job->name }} - {{ $job->sks }} SKS</option>
                    @endforeach
                </select>

                @error('otherjob_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>



            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <svg wire:loading aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                Simpan</button>
        </form>
    </div>
</div>
