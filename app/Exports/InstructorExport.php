<?php

namespace App\Exports;

use App\Models\Instructor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class InstructorExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public function headings(): array
    {
        return [
            'Id',
            "firstname",
            "lastname",
            "email",
            "phone",
            "profession",
            "address",
            "gender",
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $result = Instructor::select('id', 'firstname', 'lastname', 'email', 'phone', 'profession', 'address', 'gender', 'instagram_link', 'fb_link', 'twitter_link', 'youtube_link', 'linkedin_link')
            ->latest()
            ->get()
            ->toArray();
        return collect($result);
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
