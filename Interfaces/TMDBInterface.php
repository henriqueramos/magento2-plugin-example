<?php
namespace RamosHenrique\AdminTMDB\Interfaces;

use Nyholm\Psr7\Uri;

interface TMDBInterface {
    /**
     * Build URI
     *
     * @param array $path Default it's a nullable array
     * @param array $querystring Default it's a nullable array
     *
     * @return Uri
     */
    public function buildUri(array $path = [], array $querystring = []): Uri;
    /**
     * Get TMDB Token
     * @return string
     */
    public function getToken(): string;

    /**
     * Request movie data based on him movieId
     *
     * @param int $movieId
     * 
     * @throws TMDBException In case of trouble, throws an Exception
     * @return array
     */
    public function requestMovieData(int $movieId): array;
}