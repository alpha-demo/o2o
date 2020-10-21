<?php

    namespace App\Controller;

    use App\Service\PunkApiService;
    use http\Exception;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

    class O2OController
    {

        public function __construct(PunkApiService $punkApiService)
        {
            $this->objPunkApiService = $punkApiService;
        }

        private $objPunkApiService;

        public function getBeers()
        {

            try {
                $arrBeers    = $this->objPunkApiService->getBeers();
                $objResponse = new JsonResponse($arrBeers);
                $objResponse->headers->set("Content-Type", "application/json");
                return $objResponse;
            } catch (Exception $e) {
                throw new BadRequestHttpException($e->getMessage(), null, $e->getCode());
            }

        }

    }