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
}
