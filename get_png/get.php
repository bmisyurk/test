<?php

if (empty($_GET['w']) or empty($_GET['h']) or empty($_GET['r'])) {
    echo 'Заполните все поля';
}
else if(is_numeric($_GET['w']) and is_numeric($_GET['h'])and is_numeric($_GET['r']))
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
            $blue   = imagecolorallocate($img, 66, 134, 244);
            $red = imagecolorallocate($img, 255,   0,   0);
            $green   = imagecolorallocate($img, 0,   255,   0);
            $black  = imagecolorallocate($img, 0,   0,   0);
            $yellow  =imagecolorallocate($img, 255,   255,   0);
            while($num-- > 0)
            { $cx = rand($radius, $width - $radius);
                $cy = rand($radius, $height - $radius);
                $col = $array[array_rand($array)];
                $colour = $$col;
                imagearc($img,  $cx,  $cy,  $radius*2,  $radius*2,  0, 360, $colour);
            }

            header("Content-type: image/png");
            imagepng($img);
            imagepng($img, "newpng.png");
        }
    }

else
    echo 'Введите числовые значения!';

?>
