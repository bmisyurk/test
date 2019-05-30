<?php

if(is_numeric($_GET['w']) and is_numeric($_GET['h'])and is_numeric($_GET['r']))
{

    $width = $_GET['w'];
    $height = $_GET['h'];
    $radius = $_GET['r'];
    $num = $_GET['num'];
    if($radius > $width/2 or $radius > $height/2)
        echo 'Радиус превышает допустимые значения';
    else {
        $img = imagecreate($width, $height);
        $background = imagecolorallocate($img, 255, 255, 255);
        $array = array("blue", "red", "green", "black", "yellow", "blue");
        $blue   = imagecolorallocate($img, 24, 133, 242);
        $red = imagecolorallocate($img, 255, 42, 0);
        $green   = imagecolorallocate($img, 33, 242, 75);
        $black  = imagecolorallocate($img, 0,   0,   0);
        $yellow  = imagecolorallocate($img, 255, 255, 0);


        while($num-- > 0)
        { $cx = rand($radius/2, $width - $radius/2);
            $cy = rand($radius/2, $height - $radius/2);
            imagearc($img,  $cx,  $cy,  $radius,  $radius,  0, 360, array_rand($array, 1));
        }
        header("Content-type: image/png");
        imagepng($img);
        imagepng($img, "newpng.png");
    }
}
else
    echo 'Введите числовые значения!';
?>



<!--$img = imagecreate($width, $height);-->
<!--$background = imagecolorallocate($img, 255, 255, 255);-->
<!--$red   = imagecolorallocate($img, 255,   0,   0);-->
<!--$num = 500;-->
<!--while($num-- > 0)-->
<!--{-->
<!--    $cx = rand($radius/2, $width - $radius/2);-->
<!--    $cy = rand($radius/2, $height - $radius/2);-->
<!--    imagearc($img,  $cx,  $cy,  $radius,  $radius,  0, 360, $red);-->
<!--}-->
<!--header("Content-type: image/png");-->
<!--imagepng($img);-->
<!--imagepng($img, "newpng.png");-->
<!---->

