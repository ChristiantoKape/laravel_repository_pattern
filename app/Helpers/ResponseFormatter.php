<?php

namespace App\Helpers;

/**
 * ResponseFormatter class
 *
 * @category Helper
 * @package  App\Helpers
 * @author   Volodymyr Vadiasov <
 */
class ResponseFormatter
{
    /**
     * API Response
     * 
     * @var array
     */
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null,
        ],
        'result' => null,
    ];

    /**
     * Set response code success
     * 
     * @param int $code
     * @return void
     */
    public static function success($data = null, $message = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['result'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    /**
     * Set response code error
     * 
     * @param int $code
     * @return void
     */
    public static function error($message = null, $code = 400)
    {
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
