<?php

namespace App\Http\Controllers;


use App\Address;
use App\Church;
use App\Department;
use App\Member;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $members = Member::all();
        return view("member.index")->with(
            'members', $members
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $churches = Church::all();
        $departments = Department::all();

        return view('member.create')->with(compact('churches'))->with(compact('departments'));
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

                $member = new Member(request(['firstName', 'secondName', 'gender']));
                $church_id = request(['memberChurch']);

                $church = Church::find(intval($church_id));


                $church->members()->save($member);

                $member->save();

                $member_departments = request('departments');
                if (sizeof($member_departments) > 0) {

                    foreach ($member_departments as $department_id) {

                        $department = Department::findOrFail(intval($department_id));
                        $member->departments()->save($department);

                    }
                }

                $member->address()->save(new Address(request(['phoneNumber', 'emailAddress', 'location'])));

        });

        return redirect('member/index');
    }

    protected function validateRequest()
    {
        return request()->validate([
                'firstName' => 'required|max:255',
                'secondName' => 'required|max:255',
                'gender' => 'required|in:FEMALE,MALE',
                'memberChurch' => 'required|max:2',
                'departments' => 'array',
                'phoneNumber' => 'required',
                'emailAddress' => 'unique:addresses|max:255',
                'location' => 'required|max:255',
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param Member $member
     * @return Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     * @return Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Member $member
     * @return Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return Response
     */
    public function destroy(Member $member)
    {
        //
    }


}
