@extends('layouts.main')

@section('content')
    {{-- @dd(App\Models\User::all()) --}}

    <div class="w-full min-h-screen flex justify-center items-center p-5 ">
        <form class="w-full md:w-1/3 bg-white shadow-xl md:p-5 rounded-xl" method="post" action="/login">
            @csrf
            <div class="flex justify-center w-full">
                <img src="/si.jpeg" alt="">
            </div>
            <h1 class="text-center font-semibold my-10 text-2xl">Selamat Datang, Silahkan Login!</h1>
            <div class="mb-5">
                <input type="text" name="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Username" required />
            </div>
            <div class="mb-5">

                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="password" />
            </div>

            <div class="w-full my-10">
                <button type="submit"
                    class="text-white bg-slate-800 hover:bg-slate-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
