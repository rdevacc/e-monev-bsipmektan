<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ActivitiesExport implements FromView, WithColumnWidths, ShouldAutoSize, WithStyles
{
    protected $data;
    protected $department_array;
    protected $next_month;
    protected $currentMonth;
    protected $currentYear;

    public function __construct($data, $department_array, $next_month, $currentMonth, $currentYear)
    {
        $this->data = $data;
        $this->department_array = $department_array;
        $this->next_month = $next_month;
        $this->currentMonth = $currentMonth;
        $this->currentYear = $currentYear;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        $dataExcel  = $this->data;

        return view('app.activities.generateExcel', [
            'data' => $dataExcel,
            'department_array' => $this->department_array,
            'next_month' => $this->next_month,
            'currentMonth' => $this->currentMonth,
            'currentYear' => $this->currentYear,
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'H' => 45,
            'I' => 45,
            'J' => 45,
            'K' => 45,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A' => ['font' => ['bold' => true,]],
            'A10:A1000' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            // 'A7:K1000' => [
            //     'borders' => [
            //         'allBorders' => [
            //             'borderStyle' => Border::BORDER_MEDIUM,
            //         ],
            //     ],
            // ],
            'B10:K1000' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_TOP,
                ],
            ],
            '7' => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],

            ],
            '8' => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            '9' => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    // public function registerEvents(): array
    // {

    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {

    //             $event->sheet->getDelegate()->getStyle([])

    //                 ->getAlignment()

    //                 ->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //         },

    //     ];
    // }
}
