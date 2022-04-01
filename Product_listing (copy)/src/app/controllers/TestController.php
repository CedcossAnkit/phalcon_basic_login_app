<?php

use Phalcon\Mvc\Controller;
use Phalcon\Di;

class TestController extends Controller
{
    public function indexAction()
    {
        //code
        $helper = new \App\Components\Helper();
        // $arr = $helper->getControllerName();
        $helper->createToken();
        // $die($arr);

    }
}
