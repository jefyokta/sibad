<form class="w-full ">
    <div class="my-5  border rounded-lg shadow-lg">
        <div class="w-full bg-slate-800 backdrop-blur p-5 rounded-xl shadow-xl flex justify-between">
            <div class="text-gray-200 text-4xl font-semibold ">
                <h1>
                    Penawaran Mata Kuliah
                </h1>
                <p class="text-gray-400 text-xs">Semester
                    {{ App\Models\Semester::current()->is_odd ? 'Ganjil' : 'Genap' }}
                    {{ Date::parse(App\Models\Semester::current()->begin)->year }}/{{ Date::parse(App\Models\Semester::current()->end)->year }}
                </p>

            </div>
            <button type="button" wire:click="save"
                class="text-slate-900 bg-slate-100 hover:bg-slate-400 focus:ring-4 shadow-lg focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900">
                Simpan</button>
        </div>
    </div>

    <div class="p-10 bg-white rounded-2xl shadow-xl">

        <div class="">

            <p class="text-2xl font-semibold my-3">Form MataKuliah</p>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <tr class="max-w-max">
                    <td class="mb-2 text-sm font-medium text-gray-900">
                        Mata Kuliah
                    </td>
                    <td>
                        <select id="countries" wire:model.change="course"
                            class="my-2 bg-gray-50 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Pilih Mata Kuliah</option>

                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}-{{ $item->semester === 0 ? 'Pilihan' : $item->semester }}{{ $item->class }}
                                </option>
                            @endforeach

                        </select>
                    </td>
                </tr>
                @if ($currentcourse)
                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            Kode
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $currentcourse->code }}" readonly>

                        </td>
                    </tr>

                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            SKS
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $currentcourse->sks }}" readonly>

                        </td>
                    </tr>
                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            Semester
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $currentcourse->semester }}" readonly>

                        </td>
                    </tr>
                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            Kelas
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $currentcourse->class }}" readonly>

                        </td>
                    </tr>
                @endif

            </table>
        </div>
        <div class="mt-20">
            <p class="text-2xl font-semibold my-3">Form Dosen</p>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <tr class="max-w-max">
                    <td class="mb-2 text-sm font-medium text-gray-900">
                        Nama
                    </td>
                    <td>
                        <select wire:model.change="lecturerid"
                            class="my-2 bg-gray-50 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Pilih Dosen</option>

                            @foreach ($lecturers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </td>
                </tr>
                @if ($lecturer)
                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            NIP
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $lecturer->nip }}" readonly>

                        </td>
                    </tr>

                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            Golongan
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $lecturer->gol }}" readonly>

                        </td>
                    </tr>
                    <tr class="max-w-max">
                        <td class="mb-2 text-sm font-medium text-gray-900">
                            Pangkat
                        </td>
                        <td>
                            <input
                                class="bg-gray-50 my-2 max-w-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $lecturer->role }}" readonly>

                        </td>
                    </tr>
                @endif

            </table>
        </div>




    </div>

    </div>
</form>
