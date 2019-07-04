<?php
namespace RamosHenrique\AdminTMDB\Domains\Movies;

use RamosHenrique\AdminTMDB\Domains\TMDB\TMDB;

class Movie {
    public function saveMovie(int $movieId, string $language)
    {
        $tmdb = new TMDB();

        $tmdb->requestMovieData($movieId, $language);
    }
}