<?php

namespace App\Http\Controllers;

use App\Address;
use App\Church;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $churches = Church::all();
        return view("church.index")->with(
            'churches', $churches
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("church.create");
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
            $church = new Church(request(['name', 'isMotherChurch']));
            $church->save();
            $church->address()->save(new Address(request(['phoneNumber', 'emailAddress', 'location'])));
        });

        return redirect('church/index');

    }

    protected function validateRequest()
    {
        return request()->validate([
                'name' => 'required|unique:churches|max:255',
                'phoneNumber' => 'required',
                'emailAddress' => 'required|unique:addresses|max:255',
                'location' => 'required|max:255',
                'isMotherChurch' => 'required'
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param Church $church
     * @return Response
     */
    public function show(Church $church)
    {
        return view("church.details");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Church $church
     * @return Response
     */
    public function edit(Church $church)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Church $church
     * @return Response
     */
    public function update(Request $request, Church $church)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Church $church
     * @return Response
     */
    public function destroy(Church $church)
    {
        //
    }
}
