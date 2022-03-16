<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function loginAction()
    {
        // return '<h1>Hello!!!</h1>';

        echo "<pre>";
        if ($_REQUEST['login'] == 'login') {

            

            // if (isset($_POST['name']) && isset($_POST['password'])) {
                $student = new Student();
                $record = $student::find('rollNo=' . $_POST['password'] . ' and name="' . $_POST['name'] . '"');
                $arr = json_encode($record);
                $arr2 = json_decode($arr);

                // die(print_r($arr2));
                if (($arr2[0]->name) == $_POST['name'] && ($arr2[0]->rollNo) == $_POST['password']) {
                    die("valid user");
                } else {
                    die('Invalid User');
                }
            // }
            // else{
            //     die("not set");
            // }

            // die(count(print_r($arr)));
            // if ($arr) {
            //     die($record->marks);
            // } else if (!json_encode($record)) {
            //     die("record not found");
            // }
            // $ct=$allrecord->count();
            // echo "<pre>";
            // die(count((array)$allrecord));
            // die($allrecord);
            // die();
            // die($allrecord);
        }

        // die($allrecord);
    }
}
