<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Exception;

class DataController extends Controller
{
    private DataService $dataService;

    /**
     * DataController constructor.
     * 
     * @param DataService $dataService
     */
    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * Returns data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        try {
            $data = $this->dataService->getData();
            return response()->json([
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'statusCode' => $e->getCode(),
                    'message'    => 'An error has occurred.'
                ]
            ], $e->getCode());
        }
    }
}
