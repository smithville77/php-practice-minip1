<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\DataAccess\BlogRepository;

$blogRepository = new BlogRepository();
$blogPosts = $blogRepository->getAllPosts();

?>
<?php
// include the header file
require_once __DIR__ . '/../SharedComponents/Header.php';
?>
<h1>Welcome to the blog about nothing!</h1>
<div>
    <?php foreach ($blogPosts as $post) : ?>
        <div class="blog-post">
            <div class="blog-title">Title: <?php echo $post->title ?></div>
            <div class="blog-date">Date: <?php echo $post->date ?></div>
            <div class="username">User: <?php echo $post->user ?></div>
            <div class="blog-content"><?php echo $post->blogContent ?></div>
            <div class="blog-tags">
                <?php foreach ($post->tags as $tag) : ?>
                    <span class="tag">Tags: <?php echo $tag; ?></span>
                <?php endforeach ?>
            </div>
            <br />
        </div>


    <?php endforeach ?>
</div>