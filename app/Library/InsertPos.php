<?php


namespace App\Library;


    //
//  THIS IS THE FILE YOU ARE LOOKING FOR
//
    function insertValueAtPosition($arr, $val, $position) {
        // We accept string and method is for an array
        // so convert string to array character by character
        //$arr = str_split($arr);

        // explode converts string to array as whole not char by char
        // e.g a[0] = 1234  this 1234 will be value of index 0
        // $arr = explode(' ', $arr);


        // echo $arr[0];
        if(check_array_and_position($arr, $position))
        {
            for ($i = count($arr); $i > $position; $i--){

                $arr[$i] = $arr[$i-1];
            }
            $arr[$position] = $val;
        }
        else{

            return "Invalid Position OR Values in Array!";
        }
        // converting array to string and returning
        return($arr);
    }

    function check_array_and_position($arr, $position)
    {
        return (empty($arr) || $position < 0 || $position >= count($arr)+1) ? false : true;
    }


// $arr = "1234";
// // echo $arr."<br>";
// $arr = insertValueAtPosition($arr, 9, 2);

// echo $arr;

