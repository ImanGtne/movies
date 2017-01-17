 <div class="entete">
        <picture><img src="<?= $movie->getPosterUrl(); ?>" alt=""></picture>
        <h1><?= $movie->getTitle(); ?></h1>
    </div>
    <div class="container">
        <div class="movie-container">
          <p><?= $movie->getYear(); ?></p>
          <p><?= $movie->getCast(); ?></p>
          <p><?= $movie->getDirectors(); ?></p>
          <p><?= $movie->getWriters(); ?></p>
          <p><?= $movie->getPlot(); ?></p>
          <p><?= $movie->getRating(); ?></p>
          <p><?= $movie->getRuntime(); ?></p>
          <p><?= $movie->getTrailerUrl(); ?></p>
          <p><?= $movie->getGenres(); ?></p>
        </div>
    </div>
