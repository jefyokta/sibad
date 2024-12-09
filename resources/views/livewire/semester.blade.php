<div class="px-5">

    <div class="w-full bg-slate-800 backdrop-blur p-5 rounded-xl shadow-xl flex justify-between">
        <h1 class="text-gray-200 text-4xl font-semibold ">Arsip BAD</h1>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">

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
                            {{ Date::parse($c->begin)->year }}/{{ Date::parse($c->end)->year }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $c->approved ? 'Diterima' : 'Belum/tidak diterima' }}
                        </td>


                        <td class="px-6 py-4">
                            <a href="/bad?s={{ $c->id }}"
                                class="bg-slate-900 text-white p-2 px-4 rounded-3xl hover:bg-slate-800">Lihat bad</a>

                            @if ($c->approved)
                                <a href="/export/{{ $c->id }}"
                                    class="font-medium bg-blue-900 p-2 px-4 rounded-3xl mx-2 text-white hover:bg-blue-800">Export</a>
                            @else
                                @if (auth()->user()->isHead)
                                    <button type="button" wire:click="update({{ $c->id }})"
                                        class="bg-teal-900 text-white p-2 px-4 rounded-3xl hover:bg-slate-800"
                                        wire:confirm="Approve Bad Semester ini?">Approve</button>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
