<div class="px-5">

    <div class="w-full bg-slate-800 backdrop-blur p-5 rounded-xl shadow-xl flex justify-between">
        <h1 class="text-gray-200 text-4xl font-semibold ">Arsip BAD</h1>
        <a href="/semester/create"
            class="text-slate-900 bg-slate-100 hover:bg-slate-400 focus:ring-4 shadow-lg focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900">
            Tambah</a>

    </div>
    <div class="relative overflow-x-auto sm:rounded-lg my-10">

        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Filter</h3>
        <ul class="grid w-full gap-6 md:grid-cols-3">
            <li>
                <input type="radio" wire:model.live='sm' id="hosting-small" name="hosting" value="null"
                    class="hidden peer" required />
                <label for="hosting-small"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">Semua</div>
                        <div class="w-full">Menampilkan Semua Semester</div>
                    </div>
                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </label>
            </li>
            <li>
                <input type="radio" wire:model.live='sm' id="hosting-big" name="hosting" value="0"
                    class="hidden peer">
                <label for="hosting-big"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">Genap</div>
                        <div class="w-full">Menampilkan Semester Genap</div>
                    </div>
                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </label>
            </li>
            <li>
                <input type="radio" wire:model.live='sm' id="odd" name="hosting" value="1"
                    class="hidden peer">
                <label for="odd"
                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">Ganjil</div>
                        <div class="w-full">Menampilkan Semester Ganjil</div>
                    </div>
                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </label>
            </li>
        </ul>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Semester
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>

            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($semesters as $c)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $i++ }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $c->is_odd ? 'Ganjil' : 'Genap' }}
                        {{ $c->is_odd ? Date::parse($c->begin)->year : Date::parse($c->begin)->subYear()->year }}/{{ Date::parse($c->end)->year }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $c->approved ? 'Diterima' : 'Belum/tidak diterima' }}
                    </td>


                    <td class="px-6 py-4">
                        <a href="/bad?s={{ $c->id }}"
                            class="bg-slate-900 text-white p-2 px-4 text-xs  rounded-3xl hover:bg-slate-800">Lihat bad</a>

                        @if ($c->approved)
                            <a href="/export/{{ $c->id }}"
                                class="font-medium bg-blue-900 p-2 px-4 text-xs rounded-3xl mx-2 text-white hover:bg-blue-800">Export</a>
                        @else
                            @if (auth()->user()->isHead)
                                <button type="button" wire:click="update({{ $c->id }})"
                                    class="bg-teal-900 text-white p-2 px-4 text-xs rounded-3xl hover:bg-slate-800"
                                    wire:confirm="Approve Bad Semester ini?">Approve</button>
                            @endif
                            <a href="/course-offering?s={{ $c->id }}"
                                class="bg-green-900 text-white p-2 px-4 text-xs  rounded-3xl hover:bg-slate-800">Tambah bad</a>

                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
