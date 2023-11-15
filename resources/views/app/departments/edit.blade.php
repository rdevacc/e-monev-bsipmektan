@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="w-full p-4 bg-white border shadow-md rounded-md lg:max-w-full space-y-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex px-2 pb-4 pt-4 md:px-0 justify-center">
                <h2 class="text-xl md:text-2xl font-semibold">Edit Kelompok</h2>
            </div>
            <form action="/app/departments/{{ $data->id }}" method="POST" class="w-full bg-white shadow-md rounded my-1 px-4 pt-2 pb-4 space-y-4 lg:px-16">
                @method('PUT')
                @csrf
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="name">Nama <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="name" id="name" type="text" placeholder="Nama Kelompok" value="{{ old('name') ?:$data->name }}" autofocus>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="head_name">Nama Ketua Kelompok <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="head_name" id="head_name" type="text" placeholder="Nama Kepala Kelompok" value="{{ old('head_name') ?:$data->head_name }}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="budget">Anggaran <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="budget" id="budget" type="number" placeholder="Rp. XXX.XXX.XXX" value="{{ $data->budget }}">
                </div>
                
                
                {{-- Button --}}
                <div class="flex justify-end pt-4 space-x-2">
                    <a class="secondary-button cursor-pointer text-center" href="/app/departments/">
                        <span class="hover:text-slate-50">Back</span>
                    </a>
                    <button class="primary-button" type="submit">
                        <span class="hover:text-slate-50">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection