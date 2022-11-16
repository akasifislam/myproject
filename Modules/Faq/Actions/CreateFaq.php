<?php

namespace Modules\Faq\Actions;

use Modules\Faq\Entities\Faq;

class CreateFaq
{
    public static function create($request)
    {
        return $faq = Faq::create($request->all());
    }
}
