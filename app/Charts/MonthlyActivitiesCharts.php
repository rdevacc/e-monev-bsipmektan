<?php

namespace App\Charts;

use App\Models\Activity;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class MonthlyActivitiesCharts
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = Date('Y');
        $bulan = Date('m');

        for ($i = 1; $i <= $bulan; $i++) {
            $totalKegiatan = Activity::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->count('id');

            $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            $dataTotalKegiatan[] = $totalKegiatan;
        }


        return $this->chart->barChart()
            ->setTitle('Data Kegiatan Bulanan Tahun 2023  .')
            ->setSubtitle('Total Kegiatan Perbulan.')
            ->addData('Jumlah Kegiatan', $dataTotalKegiatan)
            // ->addData('Physical sales', [4, 9, 3, 2, 1, 8])
            ->setXAxis($dataBulan)
            ->setHeight(300);
    }
}
