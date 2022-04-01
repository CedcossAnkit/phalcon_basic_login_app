<?php

namespace App\Components;

use Phalcon\Escaper;

class Helper
{

    public function stz($data)
    {
        $escaper = new Escaper();
        return $escaper->escapeHtml($data);
    }

    public function checkEmpty($arr2)
    {
        $b = 0;
        foreach ($arr2 as $key => $value) {
            $b = $b + 1;
        }
        if ($b > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getControllerName()
    {
        $foldername = APP_PATH . "/controllers/";
        $dir = opendir($foldername);
        $file = scandir($foldername);
        // echo "<pre>";
        // var_dump($file);
        closedir($dir);

        // print_r($file);

        $arr = array();

        foreach ($file as $key => $value) {
            $b = "";
            if ($value != "." and $value != "..") {
                $index = strpos($value, "Controller.php");
                // echo $index . "<br>";
                for ($i = 0; $i < $index; $i++) {
                    $b = $b . $value[$i];
                }
                // echo $b;
                array_push($arr, $b);
            }
        }

        return $arr;
    }
}
