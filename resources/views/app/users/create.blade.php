@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="w-full p-4 bg-white border shadow-md rounded-md lg:max-w-full space-y-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex px-2 pb-4 pt-4 md:px-0 justify-center">
                <h2 class="text-xl md:text-2xl font-semibold">Tambah User</h2>
            </div>
            <form action="/app/users" method="POST" class="w-full bg-white shadow-md rounded my-1 px-4 pt-2 pb-4 space-y-4 lg:px-16">
                @csrf
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="name">Nama User <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="name" id="name" type="text" placeholder="Masukan Nama User" value="{{old('name')}}" autofocus>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="email">E-Mail <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="email" id="email" type="email" placeholder="Masukan E-Mail" value="{{old('email')}}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="role_id">Role <span class="text-red-600 text-sm">*</span></label>
                    <select name="role_id" id="role_id"  class="input-form">
                        <option selected disabled>Pilih Roles</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="password">Password <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="password" id="password" type="password" placeholder="*****">
                </div>
                              
                {{-- Button --}}
                <div class="flex justify-end pt-4 space-x-2">
                    <a class="secondary-button cursor-pointer text-center" href="/app/users/">
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