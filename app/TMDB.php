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

//    private function filterItems($items, $genreId = null)
//    {
//        $allId = $items->pluck('tmdb_id');
//
//        // Get all movies / tv shows that are already in our database.
//        $searchInDB = Item::whereIn('tmdb_id', $allId)->with('latestEpisode')->withCount('episodesWithSrc');
//
//        if($genreId) {
//            //$searchInDB->findByGenreId($genreId);
//        }
//
//        $foundInDB = $searchInDB->get()->toArray();
//
//        // Remove them from the TMDb response.
//        $filtered = $items->filter(function($item) use ($foundInDB) {
//            return ! in_array($item['tmdb_id'], array_column($foundInDB, 'tmdb_id'));
//        });
//
//        $merged = $filtered->merge($foundInDB);
//
//        // Reset array keys to display inDB items first.
//        return array_values($merged->reverse()->toArray());
//    }

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
//        try {
//            $release = Carbon::createFromFormat('Y-m-d',
//                isset($data->release_date) ? ($data->release_date ?: Item::FALLBACK_DATE) : ($data->first_air_date ?? Item::FALLBACK_DATE)
//            );
//        } catch (\Exception $exception) {
//            $release = Carbon::createFromFormat('Y-m-d', Item::FALLBACK_DATE);
//        }

        $title = $data->name ?? $data->title;

        return [
            'tmdb_id' => $data->id,
            'title' => $title,
            'slug' => getSlug($title),
            //'original_title' => $data->original_name ?? $data->original_title,
            'poster' => $data->poster_path,
            'media_type' => $mediaType,
            //'released' => $release->copy()->getTimestamp(),
            //'released_timestamp' => $release,
            'genre_ids' => $data->genre_ids,
            //'genre' => Genre::whereIn('id', $data->genre_ids)->get(),
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

    private function untilEndOfDay()
    {
        return now()->secondsUntilEndOfDay();
    }


}
