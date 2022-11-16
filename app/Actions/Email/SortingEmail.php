<?php

namespace App\Actions\Email;

use Modules\Subscription\Entities\Email;

class SortingEmail
{
    public static function sort($request)
    {
        $tasks = Email::all();
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
