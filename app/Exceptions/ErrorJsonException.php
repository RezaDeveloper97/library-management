<?php

namespace App\Exceptions;

use Exception;

class ErrorJsonException extends Exception
{
    protected $message;
    protected $statusCode;

    public function __construct($message, $statusCode = 500)
    {
        parent::__construct($message, $statusCode);
        $this->message = $message;
        $this->statusCode = $statusCode;
    }

    public function render($request)
    {
        return response()->json([
            'status' => false,
            'message' => $this->message,
        ], $this->statusCode);
    }
}
