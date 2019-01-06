<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return ApiController
     */
    public function setStatusCode(int $statusCode): ApiController
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respond($data, $headers = [])
    {
        dd($data);
        return \Response::json($data, $this->getStatusCode(), $headers);
    }

    protected function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->statusCode,
            ]
        ]);
    }

    protected function respondCreated(string $message = 'Successfully created!')
    {
        return $this->setStatusCode(201)->respond([
            'message' => $message,
        ]);
    }

    protected function respondWithPagination($paginator, $data)
    {
        $data = array_merge($data, [
            'paginator' => $paginator
        ]);

        return $this->respond($data);
    }
}