<?php
namespace RamosHenrique\AdminTMDB\Domains\TMDB;

use Nyholm\Psr7\Uri;
use Nyholm\Psr7\Factory\Psr17Factory as Requester;

use RamosHenrique\AdminTMDB\Helpers\TMDBHelper;
use RamosHenrique\AdminTMDB\Domains\TMDB\Exceptions\TMDBException;

class TMDB
{

    /**
     * @var TMDBHelper
     */
    protected $tmdbHelper;

    public function __construct()
    {
        $this->tmdbHelper = new TMDBHelper();
    }

    /**
     * Request movie data based on him movieId
     *
     * @param int $movieId
     * 
     * @throws TMDBException In case of trouble, throws an Exception
     * @return array
     */
    public function requestMovieData(int $movieId, string $language = 'en-US'): array
    {
        $uri = $this->buildUri(
            [
                'movie',
                $movieId,
            ],
            [
                'api_key' => $this->getToken(),
            ]
        );

        $requester = new Requester();
        $request = $requester->createRequest('GET', $uri);
    }

    public function getToken(): string
    {
        return $this->tmdbHelper->getConfig('general/tmdb_api_key');
    }

    public function buildUri(array $path, array $querystring): Uri
    {
        $path = implode('/', array_merge(['3'], $path));
        return (new Uri())
            ->withScheme('https')
            ->withHost('api.themoviedb.org')
            ->withPath($path)
            ->withQuery(http_build_query($querystring));
    }
}