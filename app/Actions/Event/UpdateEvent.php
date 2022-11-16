<?php

namespace App\Actions\Event;

use App\Models\Speaker;
use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;

class UpdateEvent
{
    public static function update($request, $event)
    {
        // update event
        $event->update($request->except('thumbnail', 'speakers'));

        // update image
        $thumbnail = $request->thumbnail;
        if ($thumbnail) {
            if (file_exists($event->thumbnail)) {
                FileDelete::delete($event->thumbnail);
            }
            $url = FileUpload::upload($thumbnail, 'event');
            $event->update(['thumbnail' => $url]);
        }

        // update speakers
        $event->instructors()->sync($request['speakers']);

        return $event;
    }
}
