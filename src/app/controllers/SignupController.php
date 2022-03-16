<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
    }

    // public function registerAction()
    // {
    //     $user = new Users();

    //     $user->assign(
    //         $this->request->getPost(),
    //         [
    //             'name',
    //             'email'
    //         ]
    //     );

    //     $success = $user->save();

    //     $this->view->success = $success;

    //     if ($success) {
    //         $this->view->message = "Register succesfully";
    //     } else {
    //         $this->view->message = "Not Register succesfully due to following reason: <br>" . implode("<br>", $user->getMessages());
    //     }
    // }

    public function loginaction()
    {
        $action = $this->request->getPost('Register');
        // $this->view('test');
        // print_r($_POST);
        if ($_REQUEST['Register'] == 'Register') {
            $name = $_POST['name'];
            $rollno = $_POST['rollNo'];
            $class = $_POST['class'];
            $marks = $_POST['marks'];

            $student = new Student();
            $student->assign(
                $this->request->getPost(),
                [
                    'rollNo',
                    'name',
                    'class',
                    'marks'
                ]
            );
            $success = $student->save();

            // die(json_encode($success));

            // echo $name,$rollno,$class,$marks;
            // print_r($_POST);
            // echo "hello";
            // die($name);
            if ($name == "" || $rollno == "" || $class == "" || $marks == "") {
                die("All Feilds are Requried");
            } else {
                // die("Working Fine");

            }
            // echo "dsonfdsfndmsf";
        }
    }

    
}
