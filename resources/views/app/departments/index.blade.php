@extends('layouts.app')

@section('page-content')
<div class="py-4 md:pl-[16rem] pr-1">
    <div class="overflow-x-scroll xl:overflow-auto px-2">
        <div class="flex justify-end pb-2">
            <div class="flex justify-center w-24 h-10">
                <a href="/app/departments/create" class="flex w-full justify-center items-center bg-sky-700 hover:bg-blue-600 py-1 px-2 rounded-md group text-white font-semibold"><span class="text-lg font-bold">+</span> Kelompok</a>
            </div>
        </div>

        <div class="mx-2 px-2 py-3 bg-white shadow-md rounded-md w-full lg:max-w-full p-6 space-y-4">
            <div class="flex px-2 pb-4 pt-4 md:px-0 justify-center">
                <h2 class="text-xl md:text-2xl font-semibold">Data Kelompok Kerja BSIP Mektan</h2>
            </div>
            <table class="table table-auto w-full text-sm text-left text-gray-500 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                No
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Nama Kelompok
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Nama Ketua Kelompok
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Anggaran Kelompok
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr class="bg-white border-b space-y-4 dark:bg-gray-800 dark:border-gray-700">
                            <td class="align-text-top text-center">{{ $loop->iteration }}</td>
                            <td class="align-text-top text-center">{{ $department->name }}</td>
                            <td class="align-text-top text-center">{{ $department->head_name }}</td>
                            <td class="align-text-top text-center">{{ formatRupiah($department->budget) }}</td>
                            <td class="flex space-x-1 py-2">
                                <form action="/app/departments/{{$department->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="flex justify-center text-center items-center text-white w-8 h-8 bg-red-700 hover:bg-red-600 rounded-md" onclick="return confirm('Apakah anda yakin menghapus kelompok {{$department->name}}? ')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                          </svg>
                                    </button>
                                </form>
                                <div class="flex w-8 h-8 justify-center items-center text-white rounded-md bg-yellow-500 hover:bg-yellow-400">
                                    <a href="/app/departments/{{$department->id}}/edit/">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                          </svg>
                                    </a>
                                </div>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
