<?php

namespace App\Imports;

use App\Mark;
use Maatwebsite\Excel\Concerns\ToModel;

class MarksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mark([
            'Registration_Number'=>$row[0],
            'course_id'=>$row[1],
            'grade_letter'=>$row[2],
            'grade_point'=>$row[3],
            'course_credit'=>$row[4],
            'level'=>$row[5],
            'semester'=>$row[6],
            'academic_year'=>$row[7],
            'course_status'=>$row[8],
        ]);
    }
}
