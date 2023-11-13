@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="pb-2 px-4">
            <h2 class="text-2xl font-semibold">Tambah Kegiatan</h2>
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
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form action="/app/activities" method="POST" class="space-y-4">
                @csrf
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="name">Nama <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="name" id="name" type="text" placeholder="Nama Kegiatan" value="{{old('name')}}" autofocus>
                </div>
                @error('name')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="user_id">Penanggung Jawab <span class="text-red-600 text-sm">*</span></label>
                    @if (Auth::user()->id != 1 || Auth::user()->id != 2)
                    <input class="input-form-number bg-gray-200" name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}" readonly>
                    <input class="input-form-number bg-gray-200" type="text" value="{{ Auth::user()->name }}" readonly>
                    @else
                    <select name="user_id" id="user_id" class="input-form">
                        <option selected disabled>Pilih PJ</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>{{$user->name}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                @error('user_id')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="department_id">Kelompok <span class="text-red-600 text-sm">*</span></label>
                    <select name="department_id" id="department_id" class="input-form">
                        <option selected disabled>Pilih Kelompok</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected(old('department_id') == $department->id)>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('department_id')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="division_id">Subkelompok <span class="text-red-600 text-sm">*</span></label>
                    <select name="division_id" id="division_id" class="input-form">
                        <option selected disabled>Pilih Subkelompok</option>
                        @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" @selected(old('division_id') == $division->id)>{{$division->name}}</option>
                    @endforeach
                    </select>
                </div>
                @error('division_id')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="budget">Anggaran Kelompok <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number bg-gray-200" name="budget" id="budget" type="number" value="{{ old("budget")}}" readonly>
                </div>
                @error('budget')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                @can('superAdminAndAdmin')
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="financial_target">Target Keuangan <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="financial_target" id="financial_target" type="number" placeholder="" value="{{ old("financial_target") ? : '' }}">
                </div>
                @error('financial_target')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="fincial_realization">Realisasi Keuangan <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="financial_realization" id="financial_realization" type="number" placeholder="" value="{{ old("financial_realization") ? : '' }}">
                </div>
                @error('financial_realization')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="physical_target">Target Fisik <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="physical_target" id="physical_target" type="number" placeholder="" value="{{ old("physical_target") ? : '' }}">
                </div>
                @error('physical_target')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="physical_realization">Realisasi Fisik <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="physical_realization" id="physical_realization" type="number" placeholder="" value="{{ old("physical_realization") ? : '' }}">
                </div>   
                @error('physical_realization')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror             
                @endcan
                <div id="donesField" class="flex-col justify-between space-y-2">
                    <label class="label-form-1" for="dones">Kegiatan yang sudah dikerjakan</label>
                    <div id="donesRow" class="flex space-x-4">
                        <input class="input-form-1" id="donesInput" type="text" name="dones[0]" value="{{ old("dones.0") ? : '' }}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addDonesBtn" class="add-field-form">+</button>
                        </div>
                    </div>
                </div>
                @error('dones.*')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div id="problemsField" class="flex-col justify-between space-y-2">
                    <label class="label-form-1" for="problems">Permasalahan</label>
                    <div id="problemsRow" class="flex space-x-4">
                        <input class="input-form-1" id="problemsInput" type="text" name="problems[0]" value="{{ old("problems.0") ? : '' }}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addProblemsBtn" class="add-field-form">+</button>
                        </div>
                    </div>
                </div>
                @error('problems.*')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div id="follow_UpField" class="flex-col justify-between space-y-2">
                    <label class="label-form-1" for="follow_up">Tindak Lanjut</label>
                    <div id="follow_UpRow" class="flex space-x-4">
                        <input class="input-form-1" id="follow_UpInput" type="text" name="follow_up[0]" value="{{ old("follow_up.0") ? : '' }}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addFollow_UpBtn" class="add-field-form">+</button>
                        </div>
                    </div>
                </div>
                @error('follow_up.*')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                <div id="todosField" class="flex-col justify-between space-y-2">
                    <label class="label-form-1" for="todos">Kegiatan yang akan dilakukan</label>
                    <div id="todosRow" class="flex space-x-4">
                        <input class="input-form-1" id="todosInput" type="text" name="todos[0]" value="{{ old("todos.0") ? : '' }}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addTodosBtn" class="add-field-form">+</button>
                        </div>
                    </div>
                </div>
                @error('todos.*')
                <div class="text-white text-sm bg-red-600 rounded-md px-2 py-1">{{ $message }}</div>
                @enderror
                
                {{-- Button --}}
                <div class="flex justify-end pt-4 space-x-2">
                    <a class="secondary-button cursor-pointer text-center" href="/app/activities/">
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