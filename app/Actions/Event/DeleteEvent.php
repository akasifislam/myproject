<?php

namespace App\Actions\Event;

class DeleteEvent
{
    public static function delete($event)
    {
        return $event->delete();
    }
}
