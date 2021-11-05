<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    protected function success(array $data, int $httpCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'data'    => $data,
            ],
            $httpCode
        );
    }

    protected function error(
        array $publicData = [],
        int $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR
    ): JsonResponse {

        return response()->json(
            [
                'success' => false,
                'data'    => $publicData,
            ],
            $httpCode
        );
    }
}
