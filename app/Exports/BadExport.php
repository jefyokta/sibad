<?php

namespace App\Exports;

use App\Models\Lecturers;
use App\Models\Semester;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class BadExport implements FromView, WithStyles, WithColumnWidths
{

    public function __construct(public Semester $semester) {}

    /**
     * Return the view to export to Excel
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        $lecturers = Lecturers::whereHas('bads', function ($query) {
            $query->where('semester_id', $this->semester->id);
        })->withTrashed()->get();
        // dd($lecturers);
        $semester = $this->semester;
        return view('export.bad2', compact('lecturers', 'semester'));
    }






    /**
     * Apply styles (borders, font, alignment, etc.)
     */
    public function styles($sheet)
    {
        $sheet->getStyle('A1:L1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],


        ]);
        $sheet->getStyle('A2:L2')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],


        ]);
        $sheet->getStyle('A3:L3')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],


        ]);
        $sheet->getStyle('A4:L4')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],


        ]);
        $sheet->getStyle('A5:L5')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],

        ]);
        $sheet->getStyle('A6:L6')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],

        ]);






        $sheet->getStyle('A5:L' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_DOUBLE,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);
    }

    /**
     * Adjust the column widths automatically based on the content
     */
    public function columnWidths(): array
    {
        return [
            'A' => 7,
            'B' => 25,
            'C' => 15,
            'D' => 20,
            'E' => 10,
            'F' => 30,
            'G' => 25,
            'H' => 10,
            'I' => 10,
            'J' => 15,
            'K' => 15,
            'L' => 15,

        ];
    }
}
