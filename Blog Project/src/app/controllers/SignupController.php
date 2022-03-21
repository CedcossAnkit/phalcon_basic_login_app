<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
    }

    public function lgAction()
    {
        $users = new Users();

        $action = $_POST['action'];
        if ($action == "register") {
            $users->assign(
                $this->request->getPost(),
                [
                    'name',
                    'email',
                    'password',
                ]
            );

            try {

                $success = $users->save();
                echo $success;
            } catch (Exception $e) {
                echo "Failded" . $e;
            }
        }
        // echo json_encode($_POST);


    }
}
