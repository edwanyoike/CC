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
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

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

            $church = Church::find((int)$church_id);


            $church->members()->save($member);

            $member->save();

            $member_departments = request('departments');
            if (count($member_departments) > 0) {

                foreach ($member_departments as $department_id) {

                    $department = Department::findOrFail((int)$department_id);
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


    public function importFromExcel(Request $request)
    {

        try {
            $this->validate($request, [
                'select_file' => 'required|mimes:xls,xlsx'
            ]);
        } catch (ValidationException $e) {
            return back()->with('error', 'An error occurred while validating data');
        }

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if ($data->count() > 0) {
            try {


                foreach ($data->toArray() as $key => $value) {
                    foreach ($value as $row) {

                        $churchCode = $row['churchCode'];


                        $church = DB::table('churches')->where('code', $churchCode)->get();

                        if ($church !== null) {
                            $firstName = $row['firstName'];
                            $secondName = $row['secondName'];
                            $gender = $row['gender'];

                            $phoneNumber = $row['phoneNumber'];
                            $emailAddress = $row['emailAddress'];
                            $location = $row['location'];

                            $member = new Member();
                            $member->firstName = $firstName;
                            $member->secondName = $secondName;
                            $member->gender = $gender;


                            $church->members()->save($member);

                            $member->save();

                            $address = new Address();

                            $address->phoneNumber = $phoneNumber;
                            $address->emailAddress = $emailAddress;
                            $address->location = $location;


                            $member->address()->save($address);


                        } else {
                            return back()->with('error', 'specify a church code in the system');
                        }


                    }
                }
            } catch (Exception $e) {
                return back()->with('error', 'File has invalid columns');

            }

            return back()->with('success', 'Excel Data Imported successfully.');


        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return Response
     */
    public
    function destroy(Member $member)
    {
        //
    }


}
