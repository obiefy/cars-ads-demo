<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{

    /**
     * API general response.
     * @param int $status
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function response($status = 200, $message = "", $data = []) {
        return response()->json([
            'STATUS' => $status,
            'MESSAGE' => $message,
            'DATA' => $data,
        ], $status);
    }

    /**
     * Return Success response.
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function success($message = "", $data = []) {
        return $this->response(200, $message, $data);
    }

    /**
     * Return success response with default message.
     * @param array $data
     * @return JsonResponse
     */
    public function ok($data = []) {
        return $this->success("Process is successfully completed.", $data);
    }

    /**
     * Return validation response.
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function validation($message = "", $data = []) {
        return $this->response(403,$message, $data);
    }

    /**
     * Return forbidden response.
     * @param null $message
     * @param array $data
     * @return JsonResponse
     */
    public function forbidden($message = null, $data = []) {
        return $this->response(401,$message, $data);
    }
}
