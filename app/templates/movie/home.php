<h1>Home</h1>
<div class="container"><div class="movies-container">

                <?php foreach($movies as $movie) : ?>
        <div class="movie-content">
                        <a class="movie" href="<?= BASE_URL?>/movie?id=<?= $movie->getId();?>" style="background:url('<?= $movie->getPosterUrl() ;?>') no-repeat center center;">
                                <h3><?= $movie->getTitle(); ?></h3>
                        </a>
        </div>
            <?php endforeach; ?>

        </div>
</div>
