<?php


    namespace App\Service;


    use Symfony\Component\HttpFoundation\JsonResponse;

    /**
     * Class PunkApiService retrieves the info from PunkApi: https://punkapi.com/documentation/v2
     *
     * @package App\Service
     */
    class PunkApiService
    {

        // Retrieves all beers, filtered by the 'food' field, given a string parameter, for example: "spicy" it would
        // be:
        public function getBeers()
        {
            return array("id" => "1");
        }

    }