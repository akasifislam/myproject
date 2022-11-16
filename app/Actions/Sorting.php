<?php

namespace App\Actions;

use Modules\Category\Entities\Category;

class Sorting
{
    public static function search($search, $activeCourses)
    {
        return $activeCourses->Where('title', 'Like', '%' . $search . '%')
            ->orWhere('price', 'Like', '%' . $search . '%');
    }

    public static function selectSorting($sorting, $activeCourses)
    {
        switch ($sorting) {
            case 'trending':
                $activeCourses->latest('total_views');
                break;
            case 'purchased':
                $activeCourses->latest('total_purchase');
                break;
            case 'latest':
                $activeCourses->latest();
                break;
            case 'free':
                $activeCourses->where('course_type', 'Free')->latest();
                break;
            case 'low_to_high':
                $activeCourses->oldest('price');
                break;
            case 'high_to_low':
                $activeCourses->latest('price');
                break;
            default:
                $activeCourses;
        }

        return $activeCourses;
    }



    public static function CategorySorting($category_sorting, $activeCourses)
    {
        $category = Category::select('id', 'slug')->whereSlug($category_sorting)->first();
        return $activeCourses->Where('category_id', $category->id)->latest();
    }

    public static function LevelSorting($level_sorting, $activeCourses)
    {
        return $activeCourses->Where('level', $level_sorting)->latest();
    }






    public static function PriceSorting($min, $max, $activeCourses)
    {
        return $activeCourses->where('price', '>=', $min)->where('price', '<=', $max)->where('course_type', '!=', 'Free')->latest();
    }
}
