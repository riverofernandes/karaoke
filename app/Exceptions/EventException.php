<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class EventException extends Exception
{
    /** @var protected int */
    protected int $httpcode = 400;

    /** @var protected array */
    protected array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Render the exception
     */
    public function render(): JsonResponse
    {
        return response()->json(
            [
                'message' => 'erro ao cadastrar',
                'errors'  => $this->errors,
            ],
            $this->httpcode
        );
    }
}
