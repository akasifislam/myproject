<?php

namespace App\Exports;

use App\Models\CourseEnroll;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrollExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{

    public function headings(): array
    {
        return [
            "Id",
            "Course Name",
            "Course Type",
            "Student Firstname",
            "Student Lastname",
            "Student Email"
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CourseEnroll::with('course:id,title,course_type', 'student:id,firstname,lastname,email')->latest()->get();
    }

    public function map($course_enroll): array
    {
        return [
            $course_enroll->id,
            $course_enroll->course->title,
            $course_enroll->course->course_type,
            $course_enroll->student->firstname,
            $course_enroll->student->lastname,
            $course_enroll->student->email,
            Carbon::parse($course_enroll->created_at)->toFormattedDateString(),
        ];
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
