<h1>Home</h1>
<?php foreach($movies as $movie) : ?>
        <h3><?= $movie->getTitle(); ?></h3>
<?php endforeach; ?>
