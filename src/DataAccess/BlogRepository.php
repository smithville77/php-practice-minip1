<?php
//Path: src/DataAccess/BlogRepository.php

namespace App\DataAccess;

use App\Models\BlogPost;
use App\DB\PostDB;

class BlogRepository
{
    public function __construct()
    {
    }

    public function getAllPosts()
    {
        $allPosts = [];
        // The :: operator is used to access static elements of a class without needing to instantiate an object of that class. This is particularly useful for accessing shared data or functionality across multiple instances of a class or when you don't need an instance of the class itself.
        foreach (PostDB::$dataset as $post) {
            $_post = new BlogPost($post['title'], $post['date'], $post['user'], $post['blogContent'], $post['tags']);
            array_push($allPosts, $_post);
        }
        return $allPosts;
    }
}
