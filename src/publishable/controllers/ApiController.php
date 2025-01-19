<?php

namespace App\Http\Controllers;

use App\Traits\ListScafold;

class ApiController extends Controller {
    use ListScafold;

    /**
     * success
     * ? used to return a success response
     *
     * @param  mixed  $data
     * @param  int  $code
     * @return Illuminate\Http\JsonResponse
     */
    public static function success($data, $code = 200) {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $code);
    }

    /**
     * error
     * ? used to return an error response
     *
     * @param  string  $message
     * @param  int  $code
     * @return Illuminate\Http\JsonResponse
     */
    /**
     * error
     * ? return an api response with an error message
     *
     * @param  string  $error_type
     * @param  array  $replacements
     * @return Libs\Classes\Response
     */
    public static function error($error_type, $replacements = []) {
        $error_types = config('api.errors');
        $default_err = config('api.default_error');

        foreach ($error_types as $http_code => $errors) {
            foreach ($errors as $type => $error) {
                if ($type == $error_type) {
                    return response()->json([
                        'success' => false,
                        'data' => [
                            'code' => $http_code,
                            'type' => $type,
                            'title' => strtr($error['title'], array_combine(
                                array_map(function ($k) {
                                    return '{'.$k.'}';
                                }, array_keys($replacements)),
                                $replacements
                            )),
                            'detail' => strtr($error['detail'], array_combine(
                                array_map(function ($k) {
                                    return '{'.$k.'}';
                                }, array_keys($replacements)),
                                $replacements
                            )),
                        ],
                    ], $http_code);
                }
            }
        }

        return response()->json($default_err, $default_err['code']);
    }
}
