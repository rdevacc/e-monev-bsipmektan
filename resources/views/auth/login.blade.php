@extends('layouts.app')

@section('page-content')
 <div class="h-screen flex-col justify-center items-center md:pr-4 bg-gray-800">
    <div class="flex h-auto w-[150px] mx-auto pb-4">
        <img src="/assets/png/logo-kementan.png" alt="Logo Kementan" class="w-full">
    </div>
    <div class="w-5/6 sm:w-[80%] md:w-[50%] lg:w-[40%] xl:w-[30%] px-4 pb-4 mx-auto bg-slate-100 border border-gray-800 rounded-lg shadow dark:bg-slate-100 dark:border-gray-700">
        <form class="space-y-6" action="/app/login" method="POST">
            @csrf
            <h5 class="text-xl text-gray-900 font-semibold text-center dark:text-gray-800">E-Monev BBPSI Mektan</h5>
            @error('email')
                <div class="bg-red-600 rounded-md p-2 text-center">
                    <span class="text-slate-100 align-middle">{{$message}}</span>   
                </div>
            @enderror
            <div>
                <label for="email" class="block mb-2 text-sm text-gray-900 dark:text-gray-800">E-mail</label>
                <input autofocus type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-800" placeholder="name@company.com" required>
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm text-gray-900  dark:text-gray-800">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-800" required>
            </div>
            <div class="flex items-start">
                {{-- <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" name="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">Remember me</label>
                </div> --}}
                <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Forgot Password?</a>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
        </form>
    </div>
 </div>
@endsection