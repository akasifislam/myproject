<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Course\Entities\Course;

class MyCourseExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'title',
            'slug',
            'description',
            'thumbnail',
            'price',
        ];
    }



    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Course::all();

        return collect(Course::getCourse());
    }
}
