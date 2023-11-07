@extends('layouts.app')

@section('page-content')

<div class="px-4 py-4 md:pl-[17rem] md:pr-4">
    <div class="font-bold">
        <span>PROGRES PELAKSANAAN KEGIATAN BSIP MEKTAN TAHUN {{$currentYear}}</span>
    </div>
    <br>
    <table>
        <tr>
            <td>Sampai dengan akhir bulan</td>
            <td>:</td>
            <th align="left">{{$currentMonth}}</th>
        </tr>
        <tr>
            <td>Kelompok</td>
            <td>:</td>
            <th align="left">{{$activity->department->name}}</th>
        </tr>
        <tr>
            <td>Subkelompok</td>
            <td>:</td>
            <th align="left">{{$activity->division->name}}</th>
        </tr>
        <tr>
            <td>Penanggung Jawab</td>
            <td>:</td>
            <th align="left">{{$activity->user->name}}</th>
        </tr>
        <tr>
            <td>Anggaran</td>
            <td>:</td>
            <th align="left">{{ formatRupiah($activity->budget) }}</th>
        </tr>
    </table>
    
    <div class="flex justify-end pb-4">
        <div class="flex justify-end px-2 py-2 space-x-2 items-center">
            <form action="/app/activities/excel" method="POST" target="__blank">
                @csrf
                <div class="flex w-24 h-10">
                    <input type="hidden" name="searchExcel" id="searchExcel" value="{{request()->route}}">
                    <button type="submit" class="flex w-full justify-center items-center bg-green-700 hover:bg-green-600 py-1 px-2 rounded-md group text-white font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                        </svg>
                        <span> Excel</span>
                    </button>
                </div>
            </form>
            
            <form action="/app/activities/pdf" method="POST" target="__blank">
                @csrf
                <div class="flex w-24 h-10">
                    <input type="hidden" name="activity_id" id="activity_id" value="{{ $activity_id }}">
                    <button type="submit" class="flex w-full justify-center items-center bg-red-700 hover:bg-red-600 py-1 px-2 rounded-md group text-white font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                            <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
                            <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
                            </svg>
                        <span> PDF</span>
                    </button>
                </div>
            </form>
    
            <div class="flex w-24 h-10">
                <button onclick="history.back()" class="flex w-full justify-center items-center bg-yellow-500 hover:bg-yellow-400 py-1 px-2 rounded-md group text-white font-semibold">Kembali</button>
            </div>
        </div>
    </div>

        {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md rounded-md">
        <table class="table table-auto w-full text-sm text-left text-gray-500 dark:text-gray-300">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th rowspan="3" colspan="1" class="text-center align-middle">
                        <div class="flex justify-center items-center">
                            No
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th rowspan="3" colspan="1" class="text-center align-middle">
                        <div class="flex justify-center items-center">
                            Judul Kegiatan
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th rowspan="3" colspan="1" class="text-center align-middle">
                        <div class="flex justify-center items-center">
                            Kelompok
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                        </div>
                    </th>
                    <th rowspan="1" colspan="4" class="text-center justify-center align-middle">Target dan Realisasi (%)</th>
                    <th rowspan="3" colspan="1" class="text-center align-middle">Kegiatan yang sudah dikerjakan</th>
                    <th rowspan="3" colspan="1" class="text-center align-middle">Permasalahan</th>
                    <th rowspan="3" colspan="1" style="width: 10%" class="text-center align-middle">Tindak Lantjut</th>
                    <th rowspan="3" colspan="1" class="text-center align-middle">Kegiatan yang akan dilakukan ({{$next_month}})</th>
                
                        <th rowspan="3" colspan="1" class="text-center align-middle">Action</th>
            
                </tr>
                <tr>
                    <th rowspan="1" colspan="2" class="text-center align-middle">Keuangan</th>
                    <th rowspan="1" colspan="2" class="text-center align-middle">Fisik</th>
                </tr>
                <tr>
                    <th rowspan="1" colspan="1" class="text-center align-middle">T</th>
                    <th rowspan="1" colspan="1" class="text-center align-middle">R</th>
                    <th rowspan="1" colspan="1" class="text-center align-middle">T</th>
                    <th rowspan="1" colspan="1" class="text-center align-middle">R</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="align-text-top text-center"><span class="font-semibold">1.</span></td>
                    <td class="align-text-top"><a href="/app/activities/{{$activity->id}}">{{ $activity->name }}</a></td>
                    <td class="align-text-top text-center">{{ $activity->department->name }}</td>
                    <td class="align-text-top">{{ $activity->financial_target }}%</td>
                    <td class="align-text-top">{{ $activity->financial_realization }}%</td>
                    <td class="align-text-top">{{ $activity->physical_target }}%</td>
                    <td class="align-text-top">{{ $activity->physical_realization }}%</td>
                    <td class="align-text-top">
                    @foreach ($activity->dones as $key => $value)
                        <p>
                            <span class="font-semibold">{{$loop->iteration}}</span>. {{$value}}
                        </p>
                    @endforeach
                    <td class="align-text-top">
                        @foreach ($activity->problems as $key => $value)
                        <p>
                            <span class="font-semibold">{{$loop->iteration}}</span>. {{$value}}
                        </p>
                        @endforeach
                    </td>
                    <td class="align-text-top">
                        @foreach ($activity->follow_up as $key => $value)
                        <p>
                            <span class="font-semibold">{{$loop->iteration}}</span>. {{$value}}
                        </p>
                        @endforeach
                    </td>
                    <td class="align-text-top">
                        @foreach ($activity->todos as $key => $value)
                        <p>
                            <span class="font-semibold">{{$loop->iteration}}</span>. {{$value}}
                        </p>
                        @endforeach
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
                            <a href="/app/activities/{{$activity->id}}/edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                            </a>
                        </div>
                        @endcan
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection