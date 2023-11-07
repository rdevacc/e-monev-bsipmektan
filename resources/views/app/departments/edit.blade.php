@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="pb-2 px-4">
            <h2 class="text-2xl font-semibold">Edit Kelompok</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="px-2 py-1 mx-2 my-1 rounded">
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