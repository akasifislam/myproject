<?php

namespace Modules\Event\Http\Controllers;

use App\Models\Speaker;
use App\Models\BookedSeat;
use App\Models\Instructor;
use App\Models\EventComment;
use Illuminate\Http\Request;
use Modules\Event\Entities\Event;
use App\Actions\Event\CreateEvent;
use App\Actions\Event\DeleteEvent;
use App\Actions\Event\UpdateEvent;
use Illuminate\Routing\Controller;
use App\Traits\IncrementBookedSeat;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Renderable;
use Modules\Event\Http\Requests\EventFormRequest;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    use IncrementBookedSeat;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('event::index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $instructors = Instructor::all();
        $categories = Category::latest()->get();
        return view('event::create', compact('instructors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(EventFormRequest $request)
    {
        try {
            $event = CreateEvent::create($request);

            if ($event) {
                flashSuccess('Event Added Successfully');
                return back();
            }
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
    public function show(Event $event)
    {
        return view('event::show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Event $event)
    {
        $event_instructors = $event->load('instructors:id,firstname,lastname');
        $instructors = Instructor::all(['id', 'firstname', 'lastname']);

        return view('event::edit', compact('event', 'instructors', 'event_instructors'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EventFormRequest $request, Event $event)
    {
        try {
            UpdateEvent::update($request, $event);
            flashSuccess('Event Updated Successfully');
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
    public function destroy(Event $event)
    {
        try {
            DeleteEvent::delete($event);
            flashSuccess('Event Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function eventBook(Request $request)
    {
        try {
            BookedSeat::create($request->all());
            $this->IncrementBookedSeat($request->event_id);

            flashSuccess('Your seat is booked successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function bookedSeats(Event $seats)
    {
        $events = BookedSeat::with('student', 'event')->where('id', $seats->id)->get();
        return view('event::booked-seats', compact('events'));
    }

    public function commentStore(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'user_id' => 'required',
            'comment' => 'required',
        ]);

        EventComment::create($request->all());
        flashSuccess('Your comment added successfully');
        return back();
    }


    public function loadMoreData(Request $request)
    {
        if ($request->id > 0) {
            $data = EventComment::with('users')
                ->where('id', '<', $request->id)
                ->where('event_id', $request->event_id)
                ->limit(5)
                ->latest()
                ->get();
        } else {
            $data = EventComment::with('users')
                ->where('event_id', $request->event_id)
                ->limit(5)
                ->latest()
                ->get();
        }

        $output = '';
        $last_id = '';

        if (!$data->isEmpty()) {
            $numItems = count($data);
            $i = 0;

            foreach ($data as $row) {
                if (++$i === $numItems) {
                    $output .= '
                        <div class="students-feedback-item border-0">
                            <div class="feedback-rating">
                                <div class="feedback-rating-start">
                                    <div class="image">
                                        <img src="' . asset($row->users->image) . '" alt="Image">
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">' . $row->users->firstname . ' ' . $row->users->lastname . '</a></h6>

                                    </div>
                                </div>
                                <div class="feedback-rating-end">
                                    <div class="rating-icons rating-icons-2"></div>
                                </div>
                            </div>
                            <p>
                                ' . $row->comment . '
                            </p>
                        </div>
                    ';
                } else {
                    $output .= '
                        <div class="students-feedback-item">
                            <div class="feedback-rating">
                                <div class="feedback-rating-start">
                                    <div class="image">
                                        <img src="' . asset($row->users->image) . '" alt="Image">
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">' . $row->users->firstname . ' ' . $row->users->lastname . '</a></h6>

                                    </div>
                                </div>
                                <div class="feedback-rating-end">
                                    <div class="rating-icons rating-icons-2"></div>
                                </div>
                            </div>
                            <p>
                                ' . $row->comment . '
                            </p>
                        </div>
                    ';
                }

                $last_id = $row->id;
            }
            $output .= '
                <div class="text-center" id="load_more">
                    <button type="button" id="load_more_button" class="button button-md button--primary-outline"  data-id="' . $last_id . '">Load
                        More</button>
                </div>
            ';
        } else {
            $output .= '
                <div class="text-center" id="load_more">
                    <p type="button" class="text-danger">No more comment found</p>
                </div>
            ';
        }
        return $output;
    }
}
// <p>' . $row->created_at->diffForHumans() . '</p>
