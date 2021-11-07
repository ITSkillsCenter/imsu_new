<?php

use App\StudentInfo;

function make_slug($title)
{
    return preg_replace("/[\s,\.]+/u", '-', strtolower($title));
}

function assoc2JsonArray(array $associativeArray): string
{
    $arrayElements = [];
    foreach ($associativeArray as $key => $value) {
        $arrayElements[] = [
            'key' => $key,
            'value' => $value,
        ];
    }
    return json_encode($arrayElements);
}

function exceptionLine(Exception $e): string
{
    return $e->getLine() . ': ' . $e->getFile() . ' ' . $e->getMessage();
}

function article_img($img_name = null)
{
    return url('uploads/images/articles/' . $img_name);
}

if (!function_exists('returnDataIfExists')) {

    function returnDataIfExists($datas, $db_needle, $needle)
    {

        foreach ($datas as $data) {

            if (is_object($data)) {
                $name = $data->{$db_needle};
            }

            if (is_array($data)) {
                $name = $data[$db_needle];
            }
            $name = preg_replace('/\s+/', ' ', strtolower(trim($name)));
            $needle = preg_replace('/\s+/', ' ', strtolower(trim($needle)));

            if($name == $needle) {

                return $data;
            }
        }

        return null;
    }
}

if (!function_exists('readCsvData')) {

    function readCsvData($file)
    {
        $row      = 0;
        $csvArray = array();

        if (($handle = fopen($file, "r")) !== FALSE) {

            $header = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== FALSE) {

                $csvArray[] = array_combine($header, $data);
                
            }

        }

        if (!empty($csvArray)) {

            return $csvArray;
        } else {

            return false;
        }
    }
}


if (!function_exists('generateMatricNumber')) {

    function generateMatricNumber()
    {

        $matric_number = env('MATRIC_NUMBER_PREFIX') . intCodeRandom(5);

        $student = StudentInfo::where('matric_number', '=', $matric_number)->first();

        if (!is_null($student)) {

            generateMatricNumber();
        }

        return $matric_number;
    }
}

if (!function_exists('intCodeRandom')) {

    function intCodeRandom($length = 8)
    {
        $intMin = (10 ** $length) / 10;
        $intMax = (10 ** $length) - 1;

        $codeRandom = mt_rand($intMin, $intMax);

        return $codeRandom;
    }
}

if (!function_exists('filterData')) {
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) {
            $str = '"' . str_replace('"', '""', $str) . '"';
        }
    }
}

if (!function_exists('trimString')) {

function trimString($string, $lenght){
    // strip tags to avoid breaking any html
     $string = strip_tags($string);
     if (strlen($string) > $lenght) {

         // truncate string
         $stringCut = substr($string, 0, $lenght);
         $endPoint = strrpos($stringCut, ' ');

         //if the string doesn't contain any space then it will cut without word basis.
         $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
         $string .= '...';
     }
      return $string;
 }
}
