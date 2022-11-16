<?php

namespace App\Actions\Instructor\Education;

use Modules\Instructor\Entities\InstructorEducation;

class SortingEducation
{
    public static function sort($request)
    {
        $tasks = InstructorEducation::all();
        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }

        return true;
    }
}
