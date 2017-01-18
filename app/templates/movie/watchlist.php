<h3>WATCHLIST</h3>
<div class="movies-container">

    <?php foreach($watchlist as $movie) : ?>
        <div class="movie-content">
            <a class="movie" href="<?= BASE_URL?>/movie?id=<?= $movie->getId();?>" style="background:url('<?= $movie->getPosterUrl() ;?>') no-repeat center center;">
                <h3><?= $movie->getTitle(); ?></h3>
            </a>
            <a href="<?= BASE_URL; ?>/removewatchlist?movieid=<?= $movie->getId();?>" class="remove"><i class="fa fa-trash-o"></i>Remove</a>
        </div>

    <?php endforeach; ?>
</div>