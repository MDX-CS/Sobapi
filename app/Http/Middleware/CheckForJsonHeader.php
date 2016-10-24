<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Responder\Responder;

class CheckForJsonHeader
{
    /**
     * The responder isntance.
     *
     * @var \App\Http\Responder\Responder
     */
    protected $responder;

    /**
     * Class constructor.
     *
     * @param \App\Http\Responder\Responder  $responder
     * @return void
     */
    public function __construct(Responder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! request()->wantsJson()) {
            return $this->responder
                ->unprocessable()
                ->withError(['message' => 'Please use the \'Accept: application/json\' header'])
                ->send();
        }

        return $next($request);
    }
}
