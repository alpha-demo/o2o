<?php

    namespace App\Controller;

    use App\Service\PunkApiService;
    use http\Exception;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

    class O2OController
    {

        public function __construct(PunkApiService $punkApiService)
        {
            $this->objPunkApiService = $punkApiService;
        }

        private $objPunkApiService;

        public function getBeers(Request $request)
        {
            $prmStrFoodFilter = $request->query->get('food');
            try {
                $arrBeers    = $this->objPunkApiService->getBeers($prmStrFoodFilter);
                $objResponse = new JsonResponse($arrBeers);
                $objResponse->headers->set("Content-Type", "application/json");
                return $objResponse;
            } catch (Exception $e) {
                throw new BadRequestHttpException($e->getMessage(), null, $e->getCode());
            }

        }

        public function getBeerDetails($id)
        {
            try {
                $arrBeers    = $this->objPunkApiService->getBeerDetails($id);
                $objResponse = new JsonResponse($arrBeers);
                $objResponse->headers->set("Content-Type", "application/json");
                return $objResponse;
            } catch (Exception $e) {
                throw new BadRequestHttpException($e->getMessage(), null, $e->getCode());
            }

        }

    }