<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Modules\Course\Entities\Course;
use Modules\Event\Entities\Event;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }

    /**
     * Set the category name.
     * Set the category slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function courseCount($id)
    {
        return Course::whereStatus(true)->whereCategoryId($id)->count();
    }
}
