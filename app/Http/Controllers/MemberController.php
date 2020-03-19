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
use PhpOffice\PhpSpreadsheet\IOFactory;


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

    public function importForm(Request $request)
    {
        return view("member.import");

    }


    public function importFromExcel(Request $request)
    {

        try {
            $this->validate($request, [
                   'file' => 'required|mimes:xls,xlsx'
            ]);
        } catch (ValidationException $e) {
            return back()->with('error', 'An error occurred while validating data');
        }

        try {

            $path = $request->file('file')->getRealPath();

            $reader = IOFactory::createReaderForFile($path);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($path);

            $worksheet = $spreadsheet->getActiveSheet();
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(true); // This doesn't loops through all cells only them with data,
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
                }
                $rows[] = $cells;
            }


            //
            if (count($rows) > 0) {
                unset($rows[0]);

                try {

                    foreach ($rows as $row) {

                        $churchCode = $row[6];

                   //     $church = DB::table('churches')->where('code', $churchCode)->first();

                        $church = Church::where('code', $churchCode)->first();


                        if ($church !== null) {
                            $firstName = $row[0];
                            $secondName = $row[1];
                            $gender = $row[2];

                            $phoneNumber = $row[3];
                            $emailAddress = $row[4];
                            $location = $row[5];

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
                    //

                } catch (Exception $e) {
                    return back()->with('error', $e->getMessage() );

                }


            }
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while reading file');

        }

        return back()->with('success', 'members imported successfully');

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
