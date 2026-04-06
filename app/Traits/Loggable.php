<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;
use Throwable;

trait Loggable
{
    public function infoLog(string $channel, string $message, array $context = null): void
    {
        Log::channel($channel)->info($message, $context);
    }

    public function exceptionLog(string $channel, Exception|Throwable $exception): void
    {
        Log::channel($channel)->error('Exception Log', [
            'message' => $exception->getMessage(),
            'line' => $exception->getLine(),
            'file' => $exception->getFile(),
        ]);
    }

    public function errorLog(string $channel, string $message, array $context = null): void
    {
        Log::channel($channel)->error($message, $context);
    }
}
