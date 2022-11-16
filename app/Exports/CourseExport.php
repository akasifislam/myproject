<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Modules\Course\Entities\Course;

class CourseExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    function headings(): array
    {
        return [
            'Id',
            'Title',
            'Price',
            'Discount Price',
            'Level',
            'Course Type',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (auth('instructor')->id()) {
            $result = Course::where('instructor_id', auth('instructor')->id())->select('id', 'title', 'price', 'discount_price', 'level', 'course_type')->latest()
                ->get()
                ->toArray();
            return collect($result);
        } else {
            $result = Course::select('id', 'title', 'price', 'discount_price', 'level', 'course_type')->latest()
                ->get()
                ->toArray();
            return collect($result);
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class  => function (AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },
        ];
    }
}
