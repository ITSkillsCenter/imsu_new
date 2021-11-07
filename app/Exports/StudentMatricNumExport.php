<?php

namespace App\Exports;

use App\StudentInfo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class StudentMatricNumExport implements FromCollection,WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function registerEvents(): array
    {
        $styleArray = [
        	'font'=>[
        		'bold'=>true,
        	]
        ];
        return [
            // Handle by a closure.
            AfterExport::class => function(AfterExport $event) use($styleArray) {
                $event->sheet->getStyle('A1:F1')->applyFormArray($styleArray);
            },
        ];
    }
   

    public function collection()
        {
        return view('student.matric_no', [
            'data' => $this->data
        ]);
    }


    public function headings(): array
    {
        return [
            'First_Name', 
            'Last_Name', 
            'OtherNames', 
            'Faculty', 
            'Department', 
            'Matric_Number', 
            
        ];
    }

   
}