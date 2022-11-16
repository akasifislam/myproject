<?php

namespace App\Actions\Event;

use App\Models\Speaker;
use App\Actions\File\FileUpload;
use Modules\Event\Entities\Event;

class CreateEvent
{
    public static function create($request)
    {
        // store event
        $event = Event::create($request->except(['speakers', 'thumbnail']));

        // store speakers
        $event->instructors()->attach($request['speakers']);

        // store image
        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            $url = FileUpload::upload($thumbnail, 'event');
            $event->update(['thumbnail' => $url]);
        }

        return $event;
    }
}
