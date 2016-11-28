<?php

namespace App\Exceptions;

use Exception;
use App\Http\Responder\Responder;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The responder instance.
     *
     * @var \App\Http\Responder\Responder
     */
    protected $responder;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \League\OAuth2\Server\Exception\OAuthServerException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    /**
     * A list of exceptions that should be cast to json.
     *
     * @var array
     */
    protected $responses = [
        \Illuminate\Validation\ValidationException::class => 'unprocessable',
        \Illuminate\Auth\Access\AuthorizationException::class => 'unauthorized',
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class => 'notFound',
        \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class => 'notFound',
    ];

    /**
     * Class constructor.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @param  \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(Container $container, Responder $responder)
    {
        $this->responder = $responder;

        parent::__construct($container);
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson() && array_key_exists(get_class($exception), $this->responses)) {
            return $this->responder->{$this->responses[get_class($exception)]}()->send();
        }

        if ($request->expectsJson() && env('APP_ENV') == 'production') {
            return $this->responder->internalError()->send();
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request)
    {
        if ($request->expectsJson()) {
            return $this->responder->unauthenticated()->send();
        }

        return redirect()->guest('login');
    }
}
