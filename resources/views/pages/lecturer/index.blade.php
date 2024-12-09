@extends('layouts.dashboard')

@section('contents')
    <div class="px-5">


        <div class="w-full bg-slate-800 backdrop-blur p-5 rounded-xl shadow-xl flex items-center justify-between">
            <div class="">
                <h1 class="text-gray-200 text-4xl font-semibold ">Data Dosen</h1>
                @if (request()->query('page') ?? false)
                    <p class="text-xs text-slate-400"> Halaman {{ request()->query('page') }}</p>
                @endif
            </div>
            <a href="/lecturer/create"
                class="text-slate-900 bg-slate-100 hover:bg-slate-400 focus:ring-4 shadow-lg focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-900"><svg
                    class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
            </a>
        </div>



        <div class="relative overflow-x-auto shadow-xl rounded-2xl my-5">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nip
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Golongan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jabatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tugas Lain
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

                    @foreach ($lecturers as $i => $c)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $lecturers->firstItem() + $i }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $c->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $c->nip }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $c->gol }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $c->role }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $c->otherjob->name ?? '-' }}
                            </td>


                            <td class="px-6 py-4 flex">
                                <a href="/lecturer/edit/{{ $c->id }}"
                                    class="font-medium text-teal-600 hover:underline">
                                    <svg class="w-6 h-6  dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <livewire:delete-button :id="$c->id" model='lecturer' />

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-5">
                {{ $lecturers->links() }}
            </div>

        </div>

    </div>
@endsection
