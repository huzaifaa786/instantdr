<?php

namespace App\Exceptions;

use App\Helpers\Api;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

        /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
     
        if ($exception instanceof NotFoundHttpException) {
            if ($request->is('api/*')) {
                return Api::setError('Not found');
            }
        } else if ($exception instanceof AuthenticationException) {
            
            if ($request->is('api/*')) {
                return Api::setError('Unauthorized access');
            }
        }
        return parent::render($request, $exception);
    }
}
