<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'Enrollment_Semester' => 'required|max:255',
            // 'registration_number ' => 'required|max:255|unique:student_infos',
            // 'first_name' => 'required|max:255',
            // 'middle_name' => 'required|max:255',
            // 'last_name' => 'required|max:255',
            // 'Email_Address' => 'required|email|max:255',
            // // 'Batch' => 'required|max:255',
            // // 'Program' => 'required|max:255',
            // // 'fathers_name' => 'required|max:255',
            // // 'fathers_address' => 'required|max:255',
            // 'fathers_phone' => 'required|max:255',
            // 'mothers_name' => 'required|max:255',
            // // 'mothers_address' => 'required|max:255',
            // 'mothers_phone' => 'required|max:255',
            // 'Student_Mobile_Number' => 'required|max:255',
            // // 'Guardian_Name' => 'required|max:255',
            // // 'Guardian_Mobile_Number' => 'required|max:255',
            // 'religion' => 'required|max:255',





                'Enrollment_Semester' => 'required|max:255',
                // 'registration_number ' => 'required|max:255|unique:student_infos',
                'matric_number' => 'required|unique:student_infos,matric_number',
                'registration_number' => 'required|unique:student_infos,registration_number',
                'first_name' => 'required|max:255',
                // 'middle_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'fathers_name' => 'required|max:255',
                // 'fathers_address' => 'required|max:255',
                'fathers_phone' => 'required|max:255',
                'Email_Address' => 'required|email|max:255',
                'gender' => 'required|max:255',
                'Student_Mobile_Number' => 'required|max:255',
                'religion' => 'required|max:255',
    
          
        ];
    }
}
