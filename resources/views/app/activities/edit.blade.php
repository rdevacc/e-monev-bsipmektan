@extends('layouts.app')

@section('page-content')
    <div class="py-4 md:pl-[17rem] md:pr-4">
        <div class="pb-2 px-4">
            <h2 class="text-2xl font-semibold">Edit Kegiatan</h2>
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


        <div class="px-2 py-1 mx-2 my-1 bg-gray-100 rounded">
            <form action="/app/activities/{{$activity->id}}" method="POST" class="w-full bg-white shadow-md rounded my-1 px-4 pt-2 pb-4 space-y-4 lg:px-16">
                @method('PUT')
                @csrf
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="name">Nama <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form" name="name" id="name" type="text" placeholder="Nama Kegiatan" value="{{old('name') ? : $activity->name}}" autofocus>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="user_id">Penanggung Jawab <span class="text-red-600 text-sm">*</span></label>
                    <select name="user_id" id="user_id" class="input-form">
                        <option selected disabled>Pilih PJ</option>
                        @foreach ($users as $user)
                            @if (old('user_id', $activity->user->id) == $user->id)
                            <option value="{{ $user->id }}" selected>{{$user->name}}</option>
                            @else
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endif

                    @endforeach
                    </select>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="department_id">Kelompok <span class="text-red-600 text-sm">*</span></label>
                    <select name="department_id" id="department_id"  class="input-form">
                        <option selected disabled>Pilih Kelompok</option>
                        @foreach ($departments as $department)
                            @if (old('department_id', $activity->department->id) == $department->id)
                            <option value="{{ $department->id }}" selected>{{$department->name}}</option>
                            @else
                            <option value="{{ $department->id }}">{{$department->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="division_id">Subkelompok <span class="text-red-600 text-sm">*</span></label>
                    <select name="division_id" id="division_id"  class="input-form">
                        <option selected disabled>Pilih Subkelompok</option>
                        @foreach ($divisions as $division)
                            @if (old('division_id', $activity->division->id) == $division->id)
                            <option value="{{ $division->id }}" selected>{{$division->name}}</option>
                            @else
                            <option value="{{ $division->id }}">{{$division->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="budget">Anggaran Kegiatan Kelompok <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number bg-gray-200" name="budget" id="budget" type="number" value="{{ old('budget') ? : $activity->budget }}" readonly>
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="fincial_target">Target Keuangan <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="financial_target" id="financial_target" type="number" placeholder="" value="{{old('financial_target') ? : $activity->financial_target}}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="fincial_realization">Realisasi Keuangan <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="financial_realization" id="financial_realization" type="number" placeholder="" value="{{old('financial_realization') ? : $activity->financial_realization}}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="physical_target">Target Fisik <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="physical_target" id="physical_target" type="number" placeholder="" value="{{old('physical_target') ? : $activity->physical_target}}">
                </div>
                <div class="flex justify-between sm:flex-col sm:space-y-1">
                    <label class="label-form" for="physical_realization">Realisasi Fisik <span class="text-red-600 text-sm">*</span></label>
                    <input class="input-form-number" name="physical_realization" id="physical_realization" type="number" placeholder="" value="{{old('physical_realization') ? : $activity->physical_realization}}">
                </div>
                <div id="donesField" class="flex-col justify-between space-y-2">
                    <div class="flex space-x-1 items-center justify-between">
                        <label class="label-form-1" for="dones">Kegiatan yang sudah dikerjakan</label>
                        <button type="button" id="addDonesBtn" class="add-field-form">+</button>
                    </div>
                    @foreach ($activity->dones as $dones)
                    <div id="donesRow" class="flex space-x-4">
                        <input class="input-form-1" id="donesInput" type="text" name="dones[{{$loop->iteration-1}}]" value="{{$dones}}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="removeDonesBtn" class="remove-field-form">-</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="problemsField" class="flex-col justify-between space-y-2">
                    <div class="flex space-x-1 items-center justify-between">
                        <label class="label-form-1" for="problems">Permasalahan</label>
                        <button type="button" id="addProblemsBtn" class="add-field-form">+</button>
                    </div>
                    @foreach ($activity->problems as $problems)
                    <div id="problemsRow" class="flex space-x-4">
                        <input class="input-form-1" id="problemsInput" type="text" name="problems[{{$loop->iteration-1}}]" value="{{$problems}}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addProblemsBtn" class="remove-field-form">-</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="follow_UpField" class="flex-col justify-between space-y-2">
                    <div class="flex space-x-1 items-center justify-between">
                        <label class="label-form-1" for="follow_up">Tindak Lanjut</label>
                        <button type="button" id="addFollow_UpBtn" class="add-field-form">+</button>
                    </div>
                    @foreach ($activity->follow_up as $follow_up)
                    <div id="follow_UpRow" class="flex space-x-4">
                        <input class="input-form-1" id="follow_UpInput" type="text" name="follow_up[{{$loop->iteration-1}}]" value="{{$follow_up}}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addFollow_UpBtn" class="remove-field-form">-</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="todosField" class="flex-col justify-between space-y-2">
                    <div class="flex space-x-1 items-center justify-between">
                        <label class="label-form-1" for="todos">Kegiatan yang akan dilakukan</label>
                        <button type="button" id="addTodosBtn" class="add-field-form">+</button>
                    </div>
                    @foreach ($activity->todos as $todos)
                    <div id="todosRow" class="flex space-x-4">
                        <input class="input-form-1" id="todosInput" type="text" name="todos[{{$loop->iteration-1}}]" value="{{$todos}}">
                        <div class="flex space-x-1 items-center">
                            <button type="button" id="addTodosBtn" class="remove-field-form">-</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                {{-- Button --}}
                <div class="flex justify-end pt-4 space-x-2">
                    <a class="secondary-button cursor-pointer text-center" href="/app/activities/">
                        <span class="hover:text-slate-50">Back</span>
                    </a>
                    <button class="primary-button" type="submit">
                        <span class="hover:text-slate-50">Update</span>
                    </button>
                </div>
            </form>
   
        </div>
    </div>
@endsection