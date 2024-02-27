<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\DataAccess\BlogRepository;

$blogRepository = new BlogRepository();
$blogPosts = $blogRepository->getAllPosts();


require_once __DIR__ . '/../SharedComponents/Header.php';
?>


<div class="container" style="margin-top: 100px;">
    <h1 class="mb-4 mt-5">Welcome</h1>
    <container class="row">
        <div class="col-8">
            <h2>News</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat atque enim consectetur libero earum, cumque odit esse quas praesentium sequi ex reo, tur tempora praesentium temporibus, tenetur aut consectetur laborum?</p>
        </div>
        <div class="col-4">
            <h4>Recent Articles</h4>
            <hr>
            <div>
                <h6>Article title</h6>
                <p class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quam!...</p>
            </div>
            <div>
                <h6>Article title</h6>
                <p class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, quam!...</p>
            </div>

            <hr class="mb-4">
            <h4>Recent Posts</h4>
            <?php foreach ($blogPosts as $post) : ?>
                <div class="border-top border-bottom border-secondary p-2 mb-3">
                    <h6><?php echo $post->title ?></h6>
                    <p><?php echo substr($post->blogContent, 0, 50) . "..." ?></p>
                    <button class="btn btn-primary">See more</button>
                </div>

            <?php endforeach ?>

            <button class="btn btn-secondary "><a class="text-white text-decoration-none" href="/php-practice-minip1/src/Pages/ViewPosts.php">See all posts</a></button>
        </div>
    </container>
</div>

<?php
// include the header file
require_once __DIR__ . '/../SharedComponents/Footer.php';
?>