<?php

use Phalcon\Mvc\Model;

class blog_content extends Model
{
    public int $user_id;
    public string $category;
    public string $post_title;
    public string $post_topic;
    public string $post_desc;
    public string $post_content;

}
