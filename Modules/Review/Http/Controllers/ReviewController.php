<?php

namespace Modules\Review\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Review\Entities\Review;
use Illuminate\Contracts\Support\Renderable;
use Modules\Review\Http\Requests\CreateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reviews = Review::all();
        return view('review::review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('review::review.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateReviewRequest $request)
    {
        try {
            $review = new Review();
            $review->course_id = $request->course_id;
            $review->student_id = auth()->user()->id;
            $review->instructor_id = $request->instructor_id;
            if ($review->name) {
                $review->name = $request->name;
            }
            $review->stars = $request->stars;
            $review->comment = $request->comment;
            $review->save();

            // instructor data increment
            $instructor = Instructor::find($request->instructor_id);
            $instructor->increment('total_stars', $request->stars);
            $instructor->increment('total_reviews');

            flashSuccess('Review Successful');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('review::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('review::review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateReviewRequest $request, Review $review)
    {
        try {
            $review->update($request->validated());

            flashSuccess('Review Updated Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $review = Review::find($id);
            $review->delete();

            flashSuccess('Review Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
