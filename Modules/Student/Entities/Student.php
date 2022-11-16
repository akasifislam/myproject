<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Student\Database\factories\StudentFactory::new();
    }

    /**
     * Set the student slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->firstname.'-'.$item->lastname);
        });
    }
}
