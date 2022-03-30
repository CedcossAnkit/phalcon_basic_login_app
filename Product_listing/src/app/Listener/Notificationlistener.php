<?php

namespace App\Listener;

use Phalcon\Di\Injectable;
use Setting;

class Notificationlistener extends Injectable
{
    public function hello($arr)
    {
        die(print_r($arr));
    }

    public function afterquery($obj, $obj1, $data)
    {
        $record = Setting::find();
        $arr = json_encode($record);
        $arr2 = json_decode($arr);
        // die($arr2[0]->dprice);
        $price = $arr2[0]->dprice;
        $stock = $arr2[0]->dstock;
        $dtag = $arr2[0]->dtag;

        // die($stock);

        $mainPrice = $data["Price"];
        $mainStock = $data["Stock"];
        $maintag = $data["Tags"];

        // die($mainStock);

        if ($mainPrice == "") {
            $data['Price'] = $price;
            // die($data['Price']);
        }
        if ($mainStock == "") {
            $data['Stock'] = $stock;
        }
        if ($dtag == "With Tag") {
            $data['Name'] = $data['Name'] . $maintag;
        }

        return  $data;
    }

    public function afterqueryOrder($obj, $obj1, $data)
    {
        // die(print_r($data));

        $record = Setting::find();
        $arr = json_encode($record);
        $arr2 = json_decode($arr);
        // die($arr2[0]->dprice);
        $zipcode = $arr2[0]->dzipcode;
        $fzipcode = $data["zipcode"];

        if ($fzipcode == "") {
            $data['zipcode'] = $zipcode;
        }
        return $data;
    }
}
