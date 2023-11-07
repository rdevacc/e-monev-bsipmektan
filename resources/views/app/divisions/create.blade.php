@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="pb-2 px-4">
            <h2 class="text-2xl font-semibold">Tambah Subkelompok</h2>
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
            <form action="/app/divisions" method="POST" class="w-full bg-white shadow-md rounded my-1 px-4 pt-2 pb-4 space-y-4 lg:px-16">
                @csrf
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="name">Nama Subkelompok <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="name" id="name" type="text" placeholder="Nama Subkelompok" value="{{old('name')}}" autofocus>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="head_name">Nama Ketua Subkelompok <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="head_name" id="head_name" type="text" placeholder="Nama Kepala Subkelompok" value="{{old('head_name')}}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="department_id">Kelompok<span class="text-red-600 text-sm">*</span></label>
                    <select name="department_id" id="department_id" class="input-form">
                        <option selected disabled>Pilih Kelompok</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>{{$department->name}}</option>
                    @endforeach
                    </select>
                </div>                
                
                {{-- Button --}}
                <div class="flex justify-end pt-4 space-x-2">
                    <a class="secondary-button cursor-pointer text-center" href="/app/divisions/">
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