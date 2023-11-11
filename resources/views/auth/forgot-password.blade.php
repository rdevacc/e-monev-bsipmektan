@extends('layouts.app')

@section('page-content')
<div class="h-screen flex-col justify-center items-center md:pr-4 bg-gray-800">
    <div class="flex h-auto w-[150px] mx-auto pb-4">
        <img src="/assets/png/logo-kementan.png" alt="Logo Kementan" class="w-full">
    </div>
    <div class="flex h-auto w-[200px] items-center justify-center mx-auto pb-4">
        <h2 class="text-xl text-white font-semibold">Forgot Password</h2>
    </div>
    <div class="w-5/6 sm:w-[80%] md:w-[50%] lg:w-[40%] xl:w-[30%] px-4 py-4 mx-auto bg-slate-100 border border-gray-800 rounded-lg shadow dark:bg-slate-100 dark:border-gray-700">
        <form action="{{ route('forgot-password-submit') }}" method="POST" class="space-y-2">
        @csrf
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-800">Your Email</label>
            <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
            </div>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror" placeholder="name@domain.com">
            </div>
            @error('email')
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
            @enderror
            @if (session('error'))
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ session('error') }}</div>
            @endif
            <div class="w-full">
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send Reset Password Link</button>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('login') }}" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Back to Login Page</a>
            </div> 
        </form>
    </div>
</div>

@endsection
