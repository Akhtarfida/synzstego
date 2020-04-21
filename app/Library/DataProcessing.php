<?php


namespace App\Library;
use App\Library\Processing;
use Symfony\Component\Process\Process;

class DataProcessing
{
    //Below binary method converts the List of strings into binary
//So cannot use for a single value
    public static function stringToBinary($string)
    {
        $characters = str_split($string);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = Processing::complete_bits(base_convert($data[1], 16, 2));

//            if(strlen($chr) < 8)
//            $chr = Processing::complete_bits($chr);
//
//            $binary[] = $chr;
//            echo "<pre>";
//            print_r($binary);

        }

        return implode('', $binary);
    }

    public static function binaryToString($binaries)
    {
        //$binaries = explode(' ', $binary);

        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }

        return $string;
    }


    public static function binToAscii($bin) {
        $bin = implode('', $bin);
        $text = array();
        $bin = str_split($bin, 8);

        for($i=0; count($bin)>$i; $i++)
            $text[] = chr(bindec($bin[$i]));


        return implode($text);
    }


}