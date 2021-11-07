<?php

namespace App\Imports;

use App\StudentInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentInfoImport implements ToModel,ToCollection
{
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            StudentInfo::create([
            'Enrollment_Semester'  => $row[0],
            'Registration_Number'  => $row[1], 
            'Full_Name'  => $row[2], 
            'Batch'  => $row[3], 
            'Program'  => $row[4], 
            'Gender'  => $row[4], 
            'Date_of_Birth'  => $row[5], 
            'Marital_Status'  => $row[6], 
            'Blood_Group'  => $row[7], 
            'Religion'  => $row[8], 
            'Nationality'  => $row[9], 
            'Fathers_Name'  => $row[10], 
            'Fathers_Profession'  => $row[11], 
            'Mothers_Name'  => $row[12], 
            'Mothers_Profession'  => $row[13], 
            'Student_Mobile_Number'  => $row[14], 
            'Email_Address'  => $row[15], 
            'Guardian_Name'  => $row[16], 
            'Guardian_Mobile_Number'  => $row[17], 
            'Guardian_Email'  => $row[18], 
            'Present_Address'  => $row[19], 
            'Permanent_Address'  => $row[20], 
            'Permanent_Address'  => $row[21], 
            'Photo'  => $row[22], 
            'Major_1'  => $row[23], 
            'Major_2'  => $row[24], 
            'Minor_1'  => $row[25], 
            'Minor_2'  => $row[26], 
            'Remarks'  => $row[27], 
            ]);
        }
    }

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
            'Gender'  => $row[4], 
            'Date_of_Birth'  => $row[5], 
            'Marital_Status'  => $row[6], 
            'Blood_Group'  => $row[7], 
            'Religion'  => $row[8], 
            'Nationality'  => $row[9], 
            'Fathers_Name'  => $row[10], 
            'Fathers_Profession'  => $row[11], 
            'Mothers_Name'  => $row[12], 
            'Mothers_Profession'  => $row[13], 
            'Student_Mobile_Number'  => $row[14], 
            'Email_Address'  => $row[15], 
            'Guardian_Name'  => $row[16], 
            'Guardian_Mobile_Number'  => $row[17], 
            'Guardian_Email'  => $row[18], 
            'Present_Address'  => $row[19], 
            'Permanent_Address'  => $row[20], 
            'Permanent_Address'  => $row[21], 
            'Photo'  => $row[22], 
            'Major_1'  => $row[23], 
            'Major_2'  => $row[24], 
            'Minor_1'  => $row[25], 
            'Minor_2'  => $row[26], 
            'Remarks'  => $row[27], 
           
        ]);
    }
}
