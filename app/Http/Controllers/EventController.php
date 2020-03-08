<?php

namespace App\Http\Controllers;

use App\Church;
use App\Department;
use App\Event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    public function storeDepartmentEvent(Request $request)
    {
        $this->validateRequest();


        $event = $this->initEvent($request);

        DB::transaction(static function () use ($event) {

            $organizing_departments= request('departments');
            if (count($organizing_departments) > 0) {

                foreach ($organizing_departments as $department_id) {

                    $department = Department::findOrFail((int)$department_id);

                    $department->events()->save($event);

                }
            }

            $event->save();

        });

        return redirect('department/eventlist');

    }

    public function storeChurchEvent(Request $request)
    {
       // $this->validateRequest();


        $event = $this->initEvent($request);

        DB::transaction(static function () use ($event) {

            $organizing_church= request('churches');
            if (count($organizing_church) > 0) {

                foreach ($organizing_church as $church_id) {

                    $church = Church::findOrFail((int)$church_id);

                    $church->events()->save($event);

                }
            }

            $event->save();

        });

        return redirect('church/eventlist');

    }

    protected function validateRequest()
    {
        return request()->validate([
                'name' => 'required|max:255',
                'eventDate' => 'required|max:255',
                'venue' => 'required|max:255',
                'departments' => 'array|min:1',
                'eventPoster' => 'required',
                'budget' => 'required|integer|min:100',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        //
    }

    /**
     * @param Request $request
     * @return Event
     */
    public function initEvent(Request $request): Event
    {
        $event = new Event(request(['name', 'venue', 'budget']));


        $event_start_end_date_arr = request(['eventDate']);
        $date_as_string = $event_start_end_date_arr['eventDate'];


        $split_date = explode('-', $date_as_string);

        $start_date = date_create_from_format('Y/m/d H:i', trim($split_date[0]));
        $end_date = date_create_from_format('Y/m/d H:i', trim($split_date[1]));

        $event->event_start_date = $start_date;
        $event->event_end_date = $end_date;


        if ($eventPoster = $request->file('eventPoster')) {

            $path = $eventPoster->store('public/eventposters');
            $event->event_poster_url = $path;

        }
        return $event;
    }


}
