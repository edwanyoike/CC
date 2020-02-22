<?php

namespace App\Http\Controllers;

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

        $event = new Event(request(['eventName', 'venue','budget']));



        $event_start_end_date = request(['eventDate']);

        $split_date  = explode('-',$event_start_end_date);

        $start_date = DateTime::createFromFormat('Y/m/d H:i', $split_date[0]);
        $end_date = DateTime::createFromFormat('Y/m/d H:i', $split_date[1]);

        $event->event_start_date = $start_date->getTimestamp();
        $event->event_end_date = $end_date->getTimestamp();

        if(request()->exists('eventPoster')){

            $path = $request->file('eventPoster')->storeAs(
                'eventposters', request(['eventName']).$event_start_end_date,'local'
            );

            $event->event_poster_url = $path;

        }

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

    }

    protected function validateRequest()
    {
        return request()->validate([
                'eventName' => 'required|max:255',
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


}
