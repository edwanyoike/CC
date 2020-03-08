<?php

namespace App\Http\Controllers;

use App\Church;
use App\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('department.index')->with(compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $churches = Church::all();
        return view('department.create')->with(compact('churches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store()
    {
        $this->validateRequest();
        DB::transaction(function () {
            $department = new Department(request(['name']));
            $church_id = request(['parentChurch']);
            $church = Church::find((int)$church_id);

            $church->departments()->save($department);

            $department->save();

        });

        return redirect('department/index');


    }

    protected function validateRequest()
    {
        return request()->validate([
                'name' => 'required|unique:churches|max:255',
                'parentChurch' => 'required|max:2'
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return Response
     */
    public function  update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        //
    }

    public function departmentEvents()
    {
        $departments = Department::all();
        $events=new Collection();


        foreach ($departments as $department) {
            if (count($department->events) > 0) {
                $events = $events->merge($department->events);
            }

        }

        return view('department.listEvents')->with(compact('events'));


    }

    public function createDepartmentEvent()
    {
        $departments = Department::all();

        return view('department.createEvent')->with(compact('departments'));


    }


}
