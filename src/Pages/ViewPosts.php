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
<div class="container">
    <h1 class="mb-4">Welcome to the blog about nothing!</h1>
    <div>
        <?php foreach ($blogPosts as $post) : ?>
            <div class="blog-post mb-5 border border-3 p-3 rounded w-75">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h2 class="blog-title"><?php echo $post->title ?></h2>
                    <div>Posted by <span class="fst-italic text-primary text-decoration-underline"><?php echo $post->user ?> </span>on <?php echo $post->date ?></div>
                </div>


                <div class="blog-content mb-4"><?php echo $post->blogContent ?></div>
                <div class="blog-tags">
                    <?php foreach ($post->tags as $tag) : ?>
                        <span class="tag rounded-pill bg-primary p-1 ps-2 pe-2 text-white"><?php echo $tag; ?></span>
                    <?php endforeach ?>
                </div>
                <br />
            </div>


        <?php endforeach ?>
    </div>

</div>
<?php
// include the header file
require_once __DIR__ . '/../SharedComponents/Footer.php';
?>