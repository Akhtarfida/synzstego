<?php


namespace App\Library;

use App\Library\DataProcessing;
use App\library\ImageLib;


// 115 106 65
// 117 111 68
include('insertPos.php');
//include('binarywithchunks.php');


class Processing
{




    public static function hide_data($image_path, $benc_data, $path1)
    {
        $flag = false;
        $br = false;
        $r = 0;
        $g = 0;
        $b = 0;
        $R = "";
        $G = "";
        $B = "";
        $count = 0;
        // $image = imagecreatefrompng($image_path);

        $magicObj = new ImageLib($image_path);

        $image = $magicObj->image;
        

//        echo "<img src='".asset($image_path)."'  alt='Failed To load '>";
//        dd();

        $image_width = imagesx($image);
        $image_height = imagesy($image);



        for ($x=0; $x < $image_width; $x++) {
            if ($flag == true) {	break;	}
            for ($y=0; $y < $image_height; $y++){

                $rgb = imagecolorat($image, $x, $y);// GetPixe() get color at pixel x and y
                $r = ($rgb >> 16) & 255;
                $g = ($rgb >> 8) & 255;
                $b = $rgb & 255;

                echo $r."  ".$g."  ".$b."<br/>";

                $R = decbin($r);
                $G = decbin($g);
                $B = decbin($b);


                $R = self::complete_bits($R);
                $G = self::complete_bits($G);
                $B = self::complete_bits($B);

                echo "<br>".$R." ".$G." ".$B."<br>";



                if($br)
                {	$R = "00000000";	}

                if($count <= count($benc_data)-1)
                {

                    $sbr = $R;
                    $sbg = $G;
                    $sbb = $B;

                    $item = '';

                    // Replace R with Data
                    if ($count <= count($benc_data)-1) {


                        $element_data = $benc_data[$count];
                        $l = 0;
                        $sbr[5] = '1';

                        $item = $element_data[$l];
                        $sbr[6] = $item;
                        $l++;
                        $item = $element_data[$l];
                        $sbr[7] = $item;

                        $R = $sbr;

                        $count++;
                    }
                    else
                    {	$R = "00000000";	}

                    // Replacing G
                    if($count <= count($benc_data)-1){

                        $element_data = $benc_data[$count];
                        $l = 0;
                        $sbg[5] = '1';
                        $item = $element_data[$l];
                        $sbg[6] = $item;
                        $l++;
                        $item = $element_data[$l];
                        $sbg[7] = $item;
                        $G = $sbg;
                        $count++;
                    }
                    else
                    {	$G = "00000000";	}

                    // Replacing B
                    if($count <= count($benc_data)-1){

                        $element_data = $benc_data[$count];
                        $l = 0;
                        $sbb[5] = '1';
                        $item = $element_data[$l];
                        $sbb[6] = $item;
                        $l++;
                        $item = $element_data[$l];
                        $sbb[7] = $item;
                        $B = $sbb;
                        $count++;
                    }
                    else
                    {	$B = "00000000";	}


                }

                // To Convert into Decimal
                if ($R !== "00000000" || $G !== "00000000" || $B !== "00000000"){

                    $nr = bindec($R);
                    $ng = bindec($G);
                    $nb = bindec($B);


                    $set = imagecolorallocate($image, $nr, $ng, $nb);
                    imagesetpixel($image, $x, $y, $set);

                }
                if(count($benc_data) == $count)
                {
                    $br = true;
                    $count++;
                }

                if ($R == "00000000" || $G == "00000000" || $B == "00000000"){

                    $nr = bindec($R);
                    $ng = bindec($G);
                    $nb = bindec($B);


                    echo $nr."  ".$ng."  ".$nb." and {$x}  {$y}<br/>";
                    $set = imagecolorallocate($image, $nr, $ng, $nb);
                    imagesetpixel($image, $x, $y, $set);
                    $flag = true;
                    break;
                }
            }
        }



        unlink($image_path);
        imagepng($image, $path1);
        
        return $path1;

    }


    public static function showdata($image_path)
{
	$flag = false;
	$r = 0;
	$g = 0;
	$b = 0;
	$R = "";
	$G = "";
	$B = "";
	$s = null;
	$data = null;
	$index = 0;

	$image = imagecreatefrompng($image_path);


	$width = imagesx($image);
	$height = imagesy($image);

	for ($i=0; $i < $width; $i++) {
		if($flag == true){	break;	}
			for ($j=0; $j < $height ; $j++) {

	 			$rgb = imagecolorat($image, $i, $j);
	 			$r = ($rgb >> 16) & 255;
				$g = ($rgb >> 8) & 255;
				$b = $rgb & 255;

				$R = decbin($r);
				$G = decbin($g);
				$B = decbin($b);

				$R = self::complete_bits($R);
				$G = self::complete_bits($G);
				$B = self::complete_bits($B);


				// Extracting Data
				$d = [2];
				$item = '';
				if($R!= "00000000"){

					$item = $R[(strlen($R)-2)];
					$d[0] = $item;

					$item = $R[(strlen($R)-1)];
					$d[1] = $item;


					$s.=$d[0];
					$s.=$d[1];

					if(strlen($s) == 8)
					{
						$data[$index] = $s;
						$index++;
						$s = null;
					}

				}
				else{

					$flag = true;
					break;
				}

				if($G!= "00000000"){

					$item = $G[(strlen($G)-2)];
					$d[0] = $item;
					$item = $G[(strlen($G)-1)];
					$d[1] = $item;

					$s.=$d[0];
					$s.=$d[1];

					if(strlen($s) == 8)
					{
						$data[$index] = $s;
						$index++;
						$s = null;

					}

				}
				else{

					$flag = true;
					break;
				}

				if($B!= "00000000"){

					$item = $B[(strlen($B)-2)];
					$d[0] = $item;
					$item = $B[(strlen($B)-1)];
					$d[1] = $item;

					$s.=$d[0];
					$s.=$d[1];

					if(strlen($s) == 8)
					{
						$data[$index] = $s;
						$index++;
						$s = null;

					}

				}
				else{

					$flag = true;
					break;
				}


		 	}

	}
	return $data;
}



// array of strings
public static function complete_bits($bits)
{
	$bits = str_split($bits);

	if($bits == "0" || count($bits) < 8){
		while (true) {
			if(count($bits) < 8){

				$bits = insertValueAtPosition($bits, 0, 0);
			}
			else
				{	break;	}
		}
	}
	return implode('', $bits);
}

////hide_data("uploads/image.png", ["01", "11", "00", "11"]);
//$data = showdata("images/myimage.png");
//
//var_dump($data);
////$data = implode('', $data);
////echo $data;
//$data = binaryToString($data);
//echo $data;
////echo $data;



}
