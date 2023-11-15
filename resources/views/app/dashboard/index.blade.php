@extends('layouts.app')

@section('script')
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection

@section('page-content')
<div class="py-4 md:pl-[16.5rem] pr-1">
    {{-- Charts --}}
    <div class="flex-col px-2 pb-2 space-y-2 md:px-0">
        <div class="w-full lg:max-w-3xl p-6 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>
    

    {{-- Table --}}
    <div class="mx-2 px-2 py-3 bg-white shadow-md rounded-md w-full lg:max-w-full p-6 space-y-4">
        <div class="flex px-2 pb-4 pt-4 md:px-0 justify-center">
            <h2 class="text-xl font-semibold ">Data Kegiatan Tahun 2023</h2>
        </div>
        <div class="relative overflow-x-auto">
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
                                Judul Kegiatan
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Kegiatan yang akan dilakukan
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Tanggal Pembuatan
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">
                            <div class="flex justify-center items-center">
                                Status Kegiatan
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                  </svg></a>
                            </div>
                        </th>
                        <th class="text-center align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $index => $activity)
                    <tr class="bg-white border-b space-y-4 dark:bg-gray-800 dark:border-gray-700">
                        <td class="align-text-top"><span class="font-semibold">{{ $loop->iteration }}.</span></td>
                        <td class="align-text-top"><a href="/app/activities/{{$activity->id}}">{{ $activity->name }}</a></td>
                        <td class="align-text-top">
                            @foreach ($activity->todos as $key => $value)
                            <p>
                                <span class="font-semibold">{{$loop->iteration}}</span>. {{$value}}
                            </p>
                            @endforeach
                        </td>
                        <td class="align-text-top text-center">{{ $activity->created_at->format('d F Y') }}</td>
                        <td class="align-text-top text-center">
                            @if ($activity->status == 'Sudah Selesai')
                                <div class="bg-green-800 px-2.5 py-1 rounded">
                                    <span class="text-white text-center text-sm font-semibold">{{ $activity->status }}</span>
                                </div>
                            @else
                            <div class="bg-red-700 rounded">
                                <span class="text-white text-center text-sm font-semibold">{{ $activity->status }}</span>
                            </div>
                            @endif
                        </td>
                        <td class="flex space-x-1 py-2 pr-2">
                            @can('superAdminAndAdmin')
                            <form action="/app/activities/{{$activity->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="flex justify-center text-center items-center text-white w-8 h-8 bg-red-700 hover:bg-red-600 rounded-md" onclick="return confirm('Apakah anda yakin menghapus kegiatan {{$activity->name}}? ')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </form>
                            @endcan
                            @can('update-activity', $activity)
                            <div class="flex w-8 h-8 justify-center items-center text-white rounded-md bg-yellow-500 hover:bg-yellow-400">
                                <a href="/app/activities/{{ $activity->id }}/edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>
                            </div>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection