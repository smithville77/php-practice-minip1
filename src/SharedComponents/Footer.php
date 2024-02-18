<?php

$today = getdate();

$currentYear = $today["year"];

?>

<footer>


    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>

            <div class=" d-flex justify-content-center p-2">
                <p class="text-center text-muted">© MyBlog inc, <?php echo $currentYear ?> </p>
                <div class="ms-3">
                    <span class="material-symbols-outlined">
                        sentiment_stressed
                    </span>
                    <span class="material-symbols-outlined">
                        ophthalmology
                    </span>
                    <span class="material-symbols-outlined">
                        water_do
                    </span>
                </div>
            </div>
        </footer>
    </div>
</footer>
</body>

</html>