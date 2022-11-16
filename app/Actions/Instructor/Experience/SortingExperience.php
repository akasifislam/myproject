<?php

namespace App\Actions\Instructor\Experience;

use Modules\Instructor\Entities\InstructorExperience;

class SortingExperience
{
    public static function sort($request)
    {
        $tasks = InstructorExperience::all();
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
