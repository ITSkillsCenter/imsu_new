<?php

namespace App\Imports;

use App\Syllabus;
use Maatwebsite\Excel\Concerns\ToModel;

class SyllabusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Syllabus([
            'course_id' => $row[0],
            'session_id' => $row[1],
            'department_id' => $row[2],
            'level_term' => $row[3],
            'status' => $row[4]
        ]);
    }
}
