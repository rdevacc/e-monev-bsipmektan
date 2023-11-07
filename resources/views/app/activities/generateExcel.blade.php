        <table>
            <tr>
                <td>Sampai dengan akhir bulan</td>
                <td>:</td>
                <th align="left" style="text-transform: uppercase">{{$currentMonth}}</th>
            </tr>
            <tr>
                <td>Kelompok</td>
                <td>:</td>
                <th align="left" style="text-transform: uppercase">
                    @foreach ($department_array as $department )
                        <span>{{$department}}, </span>
                    @endforeach
                </th>
            </tr>
            <tr>    
                <td>Subkelompok</td>
                <td>:</td>
                <th align="left" style="text-transform: uppercase">
                    <span>PHP</span>
                </th>
            </tr>
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <th align="left" style="text-transform: uppercase">Rizky</th>
            </tr>
            <tr>
                <td>Anggaran</td>
                <td>:</td>
                <th align="left">Rp.5000000</th>
            </tr>
        </table>


   
    <table id="table2" class="table table-auto border border-red-100" style="border: 1px, solid, black,border-collapse: collapse;">
        <thead class="bg-slate-300">
            <tr>
                <th rowspan="3" colspan="1">No</th>
                <th rowspan="3" colspan="1">Judul Kegiatan</th>
                <th rowspan="3" colspan="1">Kelompok</th>
                <th rowspan="1" colspan="4">Target dan Realisasi (%)</th>
                <th rowspan="3" colspan="1">Kegiatan yang sudah dikerjakan</th>
                <th rowspan="3" colspan="1">Permasalahan</th>
                <th rowspan="3" colspan="1">Tindak Lantjut</th>
                <th rowspan="3" colspan="1">Kegiatan yang akan dilakukan ({{$next_month}})</th>
            </tr>
            <tr>
                <th rowspan="1" colspan="2">Keuangan</th>
                <th rowspan="1" colspan="2">Fisik</th>
            </tr>
            <tr>
                <th rowspan="1" colspan="1">T</th>
                <th rowspan="1" colspan="1">R</th>
                <th rowspan="1" colspan="1">T</th>
                <th rowspan="1" colspan="1">R</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($data as $index => $activity)
            <tr class="space-y-4 even:bg-sky-100 odd:bg-slate-100" style="even:red;odd:blue;">
                <td class="align-text-top"><span class="font-semibold align-text-top">{{ $loop->iteration }}.</span></td>
                <td class="align-text-top">{{ $activity->name }}</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>


