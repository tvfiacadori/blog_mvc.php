<?php

namespace App\Controllers\Post;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;
use App\Model\Post\PostRepository;

class Post
{
    public function execute(string $identifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($identifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($identifier);

        require('templates/post.php');
    }
}