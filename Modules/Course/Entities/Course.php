<?php

namespace Modules\Course\Entities;

use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;
use App\Models\CourseEnroll;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;
use Modules\Order\Entities\OrderDetails;
use Modules\Review\Entities\Review;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory, LaravelSubQueryTrait;

    protected $guarded = [];
    protected $appends = ['star'];

    protected static function newFactory()
    {
        return \Modules\Course\Database\factories\CourseFactory::new();
    }

    /**
     * Set the course slug.
     *
     * @param  string  $value
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->title);
        });
    }

    public function getstarAttribute()
    {
        if ($this->total_stars && $this->total_ratings) {
            return round($this->total_stars / $this->total_ratings, 0);
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'id');
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function enroll()
    {
        return $this->hasMany(CourseEnroll::class);
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    // public function review()
    // {
    //     return $this->hasMany(Review::class);
    // }

    public static function ratingCount($reviews)
    {
        $averageRating = 0;

        if ($reviews->count()) {
            $totalStars = $reviews->pluck('stars')->sum();
            $averageRating = round($totalStars / $reviews->count(), 1);
        }

        return $averageRating;
    }

    public function courseEnrolled($course_id)
    {
        return CourseEnroll::whereCourseId($course_id)->whereStudentId(auth()->user()->id)->count() >= 1 ? true : false;
    }

    public function cartAlreadyExists($courseid)
    {
        $cartExist = false;

        foreach (\Cart::getContent() as $cart) {
            if ($cart->id == $courseid) {
                $cartExist = true;
            }
        }

        return $cartExist;
    }

    public function alreadyReviewed($courseid)
    {
        $reviewCount = Review::where('course_id', $courseid)->where('student_id', auth()->user()->id)->count();

        if ($reviewCount >= 1) {
            return false;
        } else {
            return true;
        }
    }

    public function courseProgress($course_id)
    {
        $totalLessons = Lesson::where('video_type', '!=', 'file')->whereCourseId($course_id)->count();
        $completeLessons = CourseProgress::whereCourseId($course_id)->count();
        if ($completeLessons && $totalLessons) {
            $courseProgress = ($completeLessons / $totalLessons) * 100;
        } else {
            $courseProgress = 0;
        }

        return $courseProgress;
    }
}
