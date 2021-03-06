<?php

    namespace App\Service;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\GuzzleException;

    /**
     * Class PunkApiService retrieves the info from PunkApi: https://punkapi.com/documentation/v2
     *
     * @package App\Service
     */
    class PunkApiService
    {
        private $API_ENDPOINT = 'https://api.punkapi.com/v2/beers';

        /**
         * Retrieves all beers, filtered by the 'food' field, given a string parameter, for example: "spicy" it would
         * be like: https://api.punkapi.com/v2/beers?food=spicy
         *
         * @param null $prmStrFoodFilter String provided as filter for the 'food' field
         *
         * @return array Array of Objects, with 3 properties: 'id', 'nombre' and 'descripcion'.
         */
        public function getBeers($prmStrFoodFilter = null)
        {
            $arrObjBeerSummary = [];
            try {
                $client            = new Client();
                $strFoodFilter     = !empty($prmStrFoodFilter) ? '?food=' . $prmStrFoodFilter : '';
                $objGuzzleResponse = $client->request('GET', $this->API_ENDPOINT . $strFoodFilter, ['verify' => false]);
                $arrObjBeers       = json_decode($objGuzzleResponse->getBody());
                if (!empty($arrObjBeers)) {
                    foreach ($arrObjBeers as $objBeer) {
                        $objBeerSummary              = new \stdClass();
                        $objBeerSummary->id          = $objBeer->id;
                        $objBeerSummary->nombre      = $objBeer->name;
                        $objBeerSummary->descripcion = $objBeer->description;
                        $arrObjBeerSummary[]         = $objBeerSummary;
                    }
                }
            } catch (GuzzleException $e) {
                echo $e->getMessage();
            }
            return $arrObjBeerSummary;
        }

        /**
         * Retrieves custom beers details, given an id, for example for id: 3 it would be:
         * https://api.punkapi.com/v2/beers/3
         *
         * @param $prmIntId Integer Id of the beer
         *
         * @return \stdClass
         */
        public function getBeerDetails($prmIntId)
        {
            $objCustomBeerDetails = new \stdClass();
            try {
                $client            = new Client();
                $objGuzzleResponse = $client->request('GET', $this->API_ENDPOINT . '/' . $prmIntId, [
                    'verify' =>
                        false
                ]);
                $arrObjBeers       = json_decode($objGuzzleResponse->getBody());
                if (!empty($arrObjBeers)) {
                    $objBeerDetails                    = $arrObjBeers[0];
                    $objCustomBeerDetails->id          = $objBeerDetails->id;
                    $objCustomBeerDetails->nombre      = $objBeerDetails->name;
                    $objCustomBeerDetails->descripcion = $objBeerDetails->description;
                    $objCustomBeerDetails->imagen      = $objBeerDetails->image_url;
                    $objCustomBeerDetails->slogan      = $objBeerDetails->tagline;
                    $objCustomBeerDetails->fabricada   = $objBeerDetails->first_brewed;
                }
            } catch (GuzzleException $e) {
                echo $e->getMessage();
            }
            return $objCustomBeerDetails;
        }

    }