<?php

namespace App\Http\Controllers;

use App\Church;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('department.index')->with(compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $churches = Church::all();
        return view('department.create')->with(compact('churches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validateRequest();
        DB::transaction(function () {
            $department = new Department(request(['name']));
            $church_id = request(['parentChurch']);
            $church = Church::find(intval($church_id));

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
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }

    public function departmentEvents(){
        $events = Department::all();

        return view('department.event')->with(compact('events'));


    }

    public function createDepartmentEvent(){
        $departments = Department::all();

        return view('department.createEvent')->with(compact('departments'));

    }


}
