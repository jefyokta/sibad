@extends('layouts.main')
@section('content')
    <nav class="fixed px-10  top-0 z-50 w-full shadow-xl rounded-es-2xl  rounded-ee-2xl bg-slate-900 backdrop-blur-sm">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100/60 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/dashboard" class="flex items-center ms-2 md:me-24">
                        <img src="/si.png" class="h-8 me-3" alt="FlowBite Logo" />
                        <div class="self-center text-white text-xl font-semibold sm:text-2xl whitespace-nowrap">
                            <p>
                                SIBAD
                            </p>
                            <p class="text-xs text-gray-400">Sistem Informasi Beban Akademik Dosen</p>

                        </div>
                    </a>
                </div>
                <div class="flex items-center ">
                    <div class="flex items-center  ">
                        <div class="flex">
                            <div class="text-gray-100 me-4 text-end">
                                <p class="font-semibold">
                                    {{ '@' . auth()->user()->name }}
                                </p>
                                <p class="text-xs text-gray-300">
                                    {{ auth()->user()->isHead ? ' Kaprodi' : 'Sekretaris' }}
                                </p>
                            </div>
                            <button type="button"
                                class="flex items-center text-sm bg-gray-800 rounded-full focus:ring-4  focus:ring-gray-300"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <div class="bg-white rounded-full shadow-md">
                                    <svg class="w-8 h-8 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>

                            </button>
                        </div>
                        <div class="z-50 hidden my-4 w-32  text-base list-none bg-white divide-y divide-gray-100 rounded shadow mr-10"
                            id="dropdown-user">
                            <div class="px-4 py-3 " role="none">

                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    {{ auth()->user()->username }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="/profile"
                                        class="block px-4 text-center py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Profile</a>
                                </li>


                                <li>

                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100/60 w-full"
                                        role="menuitem">Sign out</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @php
        $page = $page ?? 0;
    @endphp

    <aside id="logo-sidebar"
        class="fixed rounded-2xl top-24 bg-slate-800 ms-2 h-5/6 z-1 left-0 bg-slate z-40 w-64 h-5/6 pt-10 transition-transform -translate-x-full shadow-xl sm:translate-x-0"
        aria-label="Sidebar" style="z-index: 1">
        <div class=" px-3 pb-4 overflow-y-auto  ms-2 rounded-md mb-2">
            <ul class="space-y-2 font-medium text-white">
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  {{ $page === 1 ? 'bg-gray-100 text-gray-900' : '' }} hover:bg-gray-100/60 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/lecturers"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  {{ $page === 2 ? 'bg-gray-100 text-gray-900' : '' }} hover:bg-gray-100/60 group">
                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class=" ms-3 whitespace-nowrap">Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="/courses"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  {{ $page === 3 ? 'bg-gray-100 text-gray-900' : '' }} hover:bg-gray-100/60 group">
                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                        <span class=" ms-3 whitespace-nowrap">Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="/otherjob"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  {{ $page === 4 ? 'bg-gray-100 text-gray-900' : '' }} hover:bg-gray-100/60 group">
                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path
                                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                        <span class=" ms-3 whitespace-nowrap">Tugas Lain</span>
                    </a>
                </li>
                <li>
                    <a href="/course-offering"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  hover:bg-gray-100/60 group {{ $page === 5 ? 'bg-gray-100 text-gray-900' : '' }}">

                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">

                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                                clip-rule="evenodd" />

                        </svg>
                        <span class=" ms-3 whitespace-nowrap">Penawaran Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="/bad"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  hover:bg-gray-100/60 group {{ $page === 6 ? 'bg-gray-100 text-gray-900' : '' }}">
                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class=" ms-3 whitespace-nowrap">BAD</span>
                    </a>
                </li>
                <li>
                    <a href="/report"
                        class="flex items-center p-2 hover:text-gray-900 rounded-lg  hover:bg-gray-100/60 group {{ $page === 7 ? 'bg-gray-100 text-gray-900' : '' }}">
                        <svg class=" w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />

                        </svg>


                        <span class=" ms-3 whitespace-nowrap">Laporan</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-5 py-20 sm:ml-64 ">
        <div class=" bg-slate-100 backdrop-blur ms-2  p-5 py-10 mt-5 z-50 shadow-xl min-h-screen rounded-2xl">
            @yield('contents')
        </div>
    </div>
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu ingin logout?</h3>
                    <div class="flex justify-center">

                        <form action="/logout" method="POST">
                            @csrf
                            @method('delete')
                            <button data-modal-hide="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                iya
                            </button>
                        </form>
                        <button data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100/60 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
