<?php

namespace App\Listener;

use Exception;
use Phalcon\Di\Injectable;
use Setting;
use Phalcon\Security\JWT\Token\Parser;
use Phalcon\Security\JWT\Validator;

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

    public function beforeHandleRequest($obj22, $obj225, $data22)
    {
        $aclfile = APP_PATH . "/security/acl.cache";
        if (true == is_file($aclfile)) {
            $acl = unserialize(
                file_get_contents($aclfile)
            );


            $bearer = $this->request->get('bearer') ?? "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImN0eSI6ImFwcGxpY2F0aW9uXC9qc29uIn0.eyJhdWQiOlsiaHR0cHM6XC9cL3RhcmdldC5waGFsY29uLmlvIl0sImV4cCI6MTY0ODkwNDE2NiwianRpIjoiYWJjZDEyMzQ1Njc4OSIsImlhdCI6MTY0ODgxNzc2NiwiaXNzIjoiaHR0cHM6XC9cL3BoYWxjb24uaW8iLCJuYmYiOjE2NDg4MTc3MDYsInN1YiI6ImFkbWluIn0.bWZmzzlCRjl6eAQiRFj0Ukyx4CyS3YYiP-EPdYFALwiXzHSJ0GposoLEawKaM5YGHx460dTOiFu-V_1J_-gRiw";
            if ($bearer != "") {

                try {

                    $parser = new Parser();
                    $tokenObject = $parser->parse($bearer);

                    $currentTime = new \DateTimeImmutable();

                    $expireTIme = $currentTime->getTimestamp();

                    $validator = new Validator($tokenObject, 100);

                    $validator->validateExpiration($expireTIme);

                    $claim = $tokenObject->getClaims()->getPayload();
                    $role = $claim['sub'];
                    // die($role);


                    // $role = $this->request->get("rolee");
                    // die($role);
                    if (!$role || true !== $acl->isAllowed($role, ucwords($this->router->getControllerName()), $this->router->getActionName())) {
                        die("Access Denied :( ");
                    }
                } catch (Exception $e) {
                    die($e);
                }
            } else {

                die("Token Not Provided");
            }
        } else {
            die("WE DONT FIMD ANY KIND OF CACHE FILE");
        }
    }
}
