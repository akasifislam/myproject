<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public function headings(): array
    {
        return [
            "Id",
            "Firstname",
            "Lastname",
            "Lastname",
            "Email",
            "Image",
            "Phone",
            "Nationality",
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $result = User::select('id', 'firstname', 'lastname', 'email', 'image', 'phone', 'nationality')
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
