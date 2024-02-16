<?php


namespace App\Models;

class BlogPost
{
    public $title;
    public $date;
    public $user;
    public $blogContent;
    public $tags = array();
    // public $imagePath; // Maybe add this as an extension later on.

    public function __construct($title, $date, $user, $blogContent, $tags)
    {
        $this->title = $title;
        $this->date = $date;
        $this->user = $user;
        $this->blogContent = $blogContent;
        $this->tags = $tags;
    }

}