@extends('layouts.dashboard')
@section('contents')
    <div class="pt-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden bg-slate-800 shadow-xl border rounded-xl">
                <h1 class="p-6 text-2xl font-semibold text-gray-100">
                    Selamat Datang di Sistem Informasi Beban Akademik Dosen

                    <p class="text-gray-400 text-xs">Semester
                        {{ App\Models\Semester::current()->is_odd ? 'Ganjil' : 'Genap' }}
                        {{ Date::parse(App\Models\Semester::current()->begin)->year }}/{{ Date::parse(App\Models\Semester::current()->end)->year }}
                    </p>
                </h1>
            </div>
            <div class=" bg-white my-10  w-full p-10 rounded-3xl shadow-xl  justify-center">
                <div class="mb-10">
                    <h1 class="text-5xl text-center my-2 font-bold">Overview</h1>
                </div>
                <div class="flex flex-wrap justify-center  w-full ">
                    <div class="flex flex-wrap">
                        <!-- Card Dosen -->
                        <div
                            class="bg-slate-800 p-8  mb-5 shadow-xl rounded-3xl text-white flex flex-col items-center justify-center w-72   hover:shadow-xl ">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-16 h-16 text-white">

                                    <path fill-rule="evenodd"
                                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                                </svg>

                            </div>
                            <span class="text-sm font-bold text-white">Dosen</span>
                            <p class="mt-3 text-lg font-medium">{{ $lecturers }} Orang</p>
                            <div class="mt-4 w-full text-center text-sm font-semibold "> <a href="/lecturers"
                                    class="bg-slate-100 px-5 hover:bg-white rounded-xl text-slate-900 p-1">Lihat</a>

                            </div>
                        </div>
                        <!-- Card Mata Kuliah -->
                        <div
                            class="bg-slate-800 p-8 ms-5 mb-5 shadow-xl rounded-3xl text-white flex flex-col items-center justify-center w-72   hover:shadow-xl ">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-16 h-16">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>

                            </div>
                            <span class="text-sm font-bold text-white">Mata Kuliah</span>
                            <p class="mt-3 text-lg font-medium">{{ $courses }} Mata kuliah</p>
                            <div class="mt-4 w-full text-center text-sm font-semibold ">
                                <a href="/courses"
                                    class="bg-slate-100 hover:bg-white px-5 rounded-xl text-slate-900 p-1">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap">


                        <div
                            class="bg-slate-800 p-8  mb-5 shadow-xl rounded-3xl text-white flex flex-col items-center justify-center w-72   hover:shadow-xl ">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-16 h-16">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>

                            </div>
                            <span class="text-sm font-bold text-white">Mata Kuliah Semester Ini</span>
                            <p class="mt-3 text-lg font-medium">{{ $currentSemesterCourseCount }} Mata kuliah </p>
                            <div class="mt-4 w-full text-center text-sm font-semibold ">
                                <a href="/courses?c=true"
                                    class="bg-slate-100 hover:bg-white px-5 rounded-xl text-slate-900 p-1">Lihat</a>
                            </div>
                        </div>
                        <div
                            class="bg-slate-800 p-8 ms-5 mb-5 shadow-xl rounded-3xl text-white flex flex-col items-center justify-center w-72   hover:shadow-xl ">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-16 h-16">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>

                            </div>
                            <span class="text-sm font-bold text-white">Mata Kuliah Tersisa</span>
                            <p class="mt-3 text-lg font-medium">{{ $courseLeftCount }} Mata kuliah</p>
                            <div class="mt-4 w-full text-center text-sm font-semibold ">
                                <a href="/course-offering"
                                    class="bg-slate-100 hover:bg-white px-5 rounded-xl text-slate-900 p-1">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" bg-white my-10  w-full p-10 rounded-3xl shadow-xl  justify-center">
                <div class="mb-10">
                    <h1 class="text-5xl text-center my-2 font-bold">Mata Kuliah Tersisa</h1>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Matakuliah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Semester
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SKS
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Program Studi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($courseLeft as $c)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $i++ }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $c->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $c->code }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $c->semester }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $c->sks }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $c->class }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $c->studyprogram }}
                                </td>
                                <td class="px-6 py-4 flex">
                                    <a href="/course-offering?c={{ $c->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
