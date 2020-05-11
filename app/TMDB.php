<?php

namespace App;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\Response;

class TMDB
{
    private $client;
    private $apiKey;
    private $translation;

    private $base = 'https://api.themoviedb.org';

    /**
     * Get the API Key for TMDb and create an instance of Guzzle.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->apiKey = env('Tmdb_API');
        $this->translation = config('app.TRANSLATION');
        $this->client = $client;
    }

    public function trending()
    {
            $responseMovies = $this->fetchPopular('movie');
            $responseTv = $this->fetchPopular('tv');

            $tv = collect($this->createItems($responseTv, 'tv'));
            $movies = collect($this->createItems($responseMovies, 'movie'));

            $algo=$tv->merge($movies)->shuffle();


        return $algo;
    }


    private function fetchPopular($mediaType)
    {
        return $this->requestTmdb($this->base . '/3/' . $mediaType . '/popular');
    }

    private function requestTmdb($url, $query = [])
    {
        $query = array_merge([
            'api_key' => $this->apiKey,
        ], $query);

        try {
            $response = $this->client->get($url, [
                'query' => $query
            ]);

            if($this->hasLimitRemaining($response)) {
                return $response;
            }
        } catch (ClientException $e) {

            $response = $e->getResponse();

            if($this->hasLimitRemaining($response)) {
                return $response;
            }
        }

        sleep(1);
        return $this->requestTmdb($url, $query);
    }

    private function createItems($response, $mediaType)
    {
        $items = [];
        $response = json_decode($response->getBody());

        foreach($response->results as $result) {
            $items[] = $this->createItem($result, $mediaType);
        }

        return $items;
    }

    public function createItem($data, $mediaType)
    {

        $title = $data->name ?? $data->title;

        return [
            'tmdb_id' => $data->id,
            'title' => $title,
            'slug' => getSlug($title),
            'poster' => $data->poster_path,
            'media_type' => $mediaType,
            'episodes' => [],
            'overview' => $data->overview,
            'backdrop' => $data->backdrop_path,
            'homepage' => $data->homepage ?? null,
            'tmdb_rating' => $data->vote_average,
            'popularity' => $data->popularity ?? 0,
        ];
    }

    public function hasLimitRemaining($response)
    {
        if($response->getStatusCode() == 429) {
            return false;
        }

        $rateLimit = $response->getHeader('X-RateLimit-Remaining');


        return $rateLimit ? (int) $rateLimit[0] > 1 : true;
    }

        /*Get current count of seasons*/

    private function tvSeasonsCount($id, $mediaType)
    {
        if($mediaType == 'tv') {
            $response = $this->requestTmdb($this->base . '/3/tv/' . $id);

            $seasons = collect(json_decode($response->getBody())->seasons);

            return $seasons->filter(function ($season) {
                // We don't need pilots
                return $season->season_number > 0;
            })->count();
        }

        return null;
    }

    public function details($tmdbId, $mediaType)
    {
        $response = $this->requestTmdb($this->base . '/3/' . $mediaType . '/' . $tmdbId, [
            'append_to_response' => 'videos,external_ids',
        ]);

        if($response->getStatusCode() != Response::HTTP_OK) {
            // ignore any error
            return json_decode('{}');
        }

        return json_decode($response->getBody());
    }

    /*Get all episodes of each season*/


    public function tvEpisodes($tmdbId)
    {
        $seasons = $this->tvSeasonsCount($tmdbId, 'tv');
        $data = [];

        for($i = 1; $i <= $seasons; $i++) {
            $response = $this->requestTmdb($this->base . '/3/tv/' . $tmdbId . '/season/' . $i);

            $data[$i] = json_decode($response->getBody());
        }

        return $data;
    }


}
