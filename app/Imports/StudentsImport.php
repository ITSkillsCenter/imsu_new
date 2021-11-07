<?php

namespace App\Imports;

use App\StudentInfo;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentInfo([
            'Enrollment_Semester'  => $row[0],
            'Registration_Number'  => $row[1], 
            'Full_Name'  => $row[2], 
            'Batch'  => $row[3], 
            'Program'  => $row[4],  
            'Date_of_Birth'  => $row[5],
            'Gender'  => $row[6],
            'Marital_Status'  => $row[7], 
            'Blood_Group'  => $row[8], 
            'Religion'  => $row[9], 
            'Nationality'  => $row[10], 
            'Fathers_Name'  => $row[11], 
            'Fathers_Profession'  => $row[12], 
            'Mothers_Name'  => $row[13], 
            'Mothers_Profession'  => $row[14], 
            'Student_Mobile_Number'  => $row[15], 
            'Email_Address'  => $row[16], 
            'Password'  => $row[17], 
            'Guardian_Name'  => $row[18], 
            'Guardian_Mobile_Number'  => $row[19], 
            'Guardian_Email'  => $row[20], 
            'Present_Address'  => $row[21], 
            'Permanent_Address'  => $row[22], 
            'Permanent_Address'  => $row[23], 
            'Photo'  => $row[24], 
            'Major_1'  => $row[25], 
            'Major_2'  => $row[26], 
            'Minor_1'  => $row[27], 
            'Minor_2'  => $row[28], 
            'Remarks'  => $row[29],
        ]);
    }
}
