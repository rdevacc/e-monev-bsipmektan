@extends('layouts.app')

@section('page-content')
<div class="h-screen flex-col justify-center items-center md:pr-4 bg-gray-800">
    <div class="flex h-auto w-[150px] mx-auto pb-4">
        <img src="/assets/png/logo-kementan.png" alt="Logo Kementan" class="w-full">
    </div>
    <div class="flex h-auto w-[200px] items-center justify-center mx-auto pb-4">
        <h2 class="text-xl text-white font-semibold">Reset Password</h2>
    </div>
    <div class="w-5/6 sm:w-[80%] md:w-[50%] lg:w-[40%] xl:w-[30%] px-4 py-4 mx-auto bg-slate-100 border border-gray-800 rounded-lg shadow dark:bg-slate-100 dark:border-gray-700">
        <form action="{{ route('reset-password-submit') }}" method="POST" class="space-y-2">
        @csrf

            <input type="hidden" name="reset_token" value="{{ $reset_token }}">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-800">Your New Password</label>
            <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z"/>
                </svg>
            </div>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror" placeholder="*****">
            </div>
            @error('password')
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
            @enderror
            @if (session('error'))
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ session('error') }}</div>
            @endif
            <label for="retype_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-800">Retype Password</label>
            <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z"/>
                </svg>
            </div>
            <input type="password" name="retype_password" id="retype_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('retype_password') is-invalid @enderror" placeholder="*****">
            </div>
            @error('retype_password')
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
            @enderror
            @if (session('error'))
            <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ session('error') }}</div>
            @endif
            <div class="w-full">
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset Password</button>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('login') }}" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Back to Login Page</a>
            </div> 
        </form>
    </div>
</div>

@endsection
