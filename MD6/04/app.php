<?php declare(strict_types=1);

require_once 'Movie.php';

$movies = [
  new Movie('Casino Royale', 'Eon Productions', 'PG13'),
  new Movie('Glass', 'Buena Vista International', 'PG13'),
  new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
];

$PGMovies = $movies[0]->getPG($movies);
foreach ($PGMovies as $movie) {
  echo $movie->getTitle() . ' | ' . $movie->getStudio() . ' | ' . $movie->getRating() . PHP_EOL;
}