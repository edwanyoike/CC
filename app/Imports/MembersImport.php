<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MembersImport implements ToCollection
{

    /**
     * @inheritDoc
     */
    public function collection(Collection $collection)
    {

        $dataToImport = array();

        foreach ($collection as $row) {
            $dataToImport [] = array(
                'firstName' => $row[0],
                'secondName' => $row[1],
                'gender' => $row[2],
                'phoneNumber' => $row[3],
                'emailAddress' => $row[4],
                'location' => $row[5],
                'churchCode' => $row[6]
            );

        }

        return $dataToImport;
    }

}
