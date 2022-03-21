<?php
session_start();
use Phalcon\Mvc\Controller;


class BlogController extends Controller
{
    public function indexAction()
    {


        return '<h1>Hello World!</h1>';
    }

    public function blogAction()
    {
        // empty
    }

    public function MainblogAction()
    {
        // empty
    }
    public function aboutAction()
    {
        // empty
    }
    public function blog_detailsAction()
    {
        // empty
    }
    public function contactAction()
    {
        // empty
    }
    public function teamAction()
    {
        // empty
    }
    public function dashboardAction()
    {
        // empty
    }

    public function writeBlogAction()
    {
        //empty
        // $caragory = $_POST['catagory'];
        // $topic = $_POST['topic'];
        // $title = $_POST['title'];
        // $description = $_POST['desc'];
        // $content = $_POST['content'];
        // $user_id=$_SESSION['login'][0]->id;
        $blog = new Blog_Content();

        if ($_POST['action'] == "savedata") {
            // echo "hello";
            $blog->assign(
                $this->request->getPost(),
                [
                    'user_id',
                    'category',
                    'post_title',
                    'post_topic',
                    'post_desc',
                    'post_content',
                ]
            );


            try {

                $success = $blog->save();
                echo $success;
            } catch (Exception $e) {
                echo "Fail" . $e;
            }
        }

        // echo "$caragory,$topic,$title,$description,$content";
    }
}
