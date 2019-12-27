<?php

namespace Foxit07\Admin\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    public function render($request, Exception $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return $this->unauthorized($request, $exception);
        }

        return parent::render($request, $exception);
    }

    private function unauthorized($request, Exception $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => $exception->getMessage()], 403);
        }

       /* flash()->warning($exception->getMessage());*/
        return back()->with('message', 'Нет прав на выполнение данного действия');
    }
}
