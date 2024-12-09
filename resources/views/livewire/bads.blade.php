<div class="px-5">

    <div class="w-full bg-slate-800 backdrop-blur p-5 rounded-xl shadow-xl my-5">
        <h1 class="text-gray-200 text-4xl font-semibold ">Beban Akademik</h1>
        <p class="text-gray-400">
            Semester {{ $semester->is_odd ? 'Ganjil' : 'Genap' }}
            {{ Date::parse($semester->begin)->year }}/{{ Date::parse($semester->end)->year }}</p>
    </div>


    <div class=" overflow-x-auto shadow-xl rounded-2xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Dosen
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Tugas Lain
                    </th>

                    <th scope="col" class="px-6 py-3">
                        MataKuliah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Bad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        kelebihan
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($bads as $b)
                    @php
                        $sksTotal = 0;
                        $theirbad = \App\Models\Bad::select('*')
                            ->where('lecturer_id', $b->lecturer_id)
                            ->get();

                        foreach ($theirbad as $t) {
                            $sksTotal += $t->course->sks;
                        }

                        $sksTotal += $b->lecturer->otherjob->sks ?? 0;
                        $persentage = ($sksTotal / 16) * 100;

                        $color = 'bg-teal-500';

                        if ($persentage >= 95) {
                            $color = 'bg-red-500';
                        } elseif ($persentage >= 70) {
                            $color = 'bg-yellow-400';
                        }

                    @endphp
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $i += 1 }}
                        </th>
                        <td class="px-6 py-4" data-popover-target="popover-lecturer-{{ $b->id }}"
                            data-popover-placement="right">
                            <a href="#" class="text-blue-500 undeline-1">
                                {{ $b->lecturer->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $b->lecturer->otherjob->name ?? 'Lektor' }}
                        </td>


                        <td class="px-6 py-4 text-blue-500 text-undeline"
                            data-popover-target="popover-course-{{ $b->id }}" data-popover-placement="right">
                            {{ $b->course->name }}
                            {{ $b->course->semester === 0 ? 'Pilihan' : $b->course->semester }}{{ $b->course->class }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sksTotal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sksTotal - 16 > 0 ? $sksTotal - 16 : 0 }}
                        </td>

                        <td class="px-6 py-4">
                            <livewire:delete-button :id="$b->id" model='bad' />

                        </td>
                    </tr>
                    <div data-popover id="popover-lecturer-{{ $b->id }}" role="tooltip"
                        class="absolute z-10 invisible inline-block text-sm   duration-300 bg-slate-700 text-gray-300 rounded-3xl shadow-xl opacity-0 w-80 00 shadow-xl">
                        <div class="p-4 shadow-xl space-y-4">
                            <!-- Header dengan Nama -->
                            <div class="flex items-center  space-x-3">
                                <div
                                    class="flex items-center justify-center  w-12 h-12 bg-white rounded-full shadow-md dark:bg-gray-700">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                </div>
                                <div class="">
                                    <h3 class="text-lg font-bold text-white dark:text-gray-200">
                                        {{ $b->lecturer->name }}

                                    </h3>
                                    <p class="text-sm font-light">{{ $b->lecturer->nip }}</p>
                                </div>
                            </div>
                            <!-- Detail -->
                            <div>
                                <div class="space-x-3 flex w-full">
                                    <div class="text-sm">
                                        <p class="font-semibold">Pangkat </p>
                                        <p class="font-semibold">Golongan </p>
                                        <p class="font-semibold">Total Beban</p>


                                    </div>
                                    <div class="text-sm">
                                        <p>
                                            : {{ $b->lecturer->role->name ?? 'Dosen' }}
                                        </p>
                                        <p>
                                            : {{ $b->lecturer->gol }}

                                        </p>
                                        <p>
                                            : {{ $sksTotal }} SKS
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="w-full bg-slate-100 shadow-xl rounded-full h-2.5 dark:bg-gray-700">
                                <div class="{{ $color }} h-2.5 rounded-full transition-all"
                                    style="width: {{ $persentage >= 100 ? 100 : $persentage }}%"></div>
                            </div>

                            <!-- Aksi -->

                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    {{-- Popover matkul --}}
                    <div data-popover id="popover-course-{{ $b->id }}" role="tooltip"
                        class="absolute z-10 invisible inline-block text-sm text-gray-500  duration-300  bg-slate-700  text-white  overflow-hidden rounded-2xl shadow-xl opacity-0 w-80 shadow-xl">
                        <div class=" space-y-4">
                            <!-- Header dengan Nama -->
                            <div class="flex p-5  bg-slate-700 items-center space-x-3">

                                <div>
                                    <h3 class="text-lg font-bold text-slate-100">
                                        {{ $b->course->name }}
                                    </h3>
                                    <p class="text-sm font-light text-slate-300">{{ $b->course->code }}</p>
                                </div>
                            </div>
                            <!-- Detail -->
                            <div class="p-4 bg-white rounded-lg shadow-md  dark:bg-gray-800">
                                <div class="space-y-1">
                                    <!-- Kelas -->
                                    <div class="flex ">
                                        <span
                                            class="text-sm w-24 font-semibold text-gray-700 dark:text-gray-300">Smt/Kelas</span>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">:
                                            {{ $b->course->semester }}{{ $b->course->class ?? '-' }}</span>
                                    </div>
                                    <div class="flex ">
                                        <span
                                            class="text-sm w-24 font-semibold text-gray-700 dark:text-gray-300">Prodi</span>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">:
                                            {{ $b->course->studyprogram }}</span>
                                    </div>
                                    <div class="flex ">
                                        <span
                                            class="text-sm w-24 font-semibold text-gray-700 dark:text-gray-300">SKS</span>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">:
                                            {{ $b->course->sks }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div data-popper-arrow></div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
