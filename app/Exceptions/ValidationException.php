<?php

namespace App\Exceptions;


use App\Common\Tools\APIResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ValidationException
 * @package App\Exceptions
 */
class ValidationException extends Exception
{

    /**
     * @var object
     */
    private object $errors;

    /**
     * ValidationException constructor.
     * @param object $errors
     */
    public function __construct(object $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return JsonResponse
     */
    public function render()
    {
        return APIResponse::errorResponse($this->errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
