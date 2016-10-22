<?php

namespace App\Http\Responder;

use BadMethodCallException;

class Responder
{
    /**
     * HTTP status code.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Json to be returned.
     *
     * @var array
     */
    protected $json;

    /**
     * Sets the status code to 200.
     *
     * @return self
     */
    public function ok()
    {
        $this->status(200);

        return $this;
    }

    /**
     * Sets the status code to 200 and updates the msssage.
     *
     * @return self
     */
    public function deleted()
    {
        $this->status(200);

        $this->json['success'] = trans('responses.deleted');

        return $this;
    }

    /**
     * Sets the status code to 201 and updates the message.
     *
     * @return self
     */
    public function created()
    {
        $this->status(201);

        $this->json['success'] = trans('responses.created');

        return $this;
    }

    /**
     * Sets the status code to 202 and updates the message.
     *
     * @return self
     */
    public function accepted()
    {
        $this->status(202);

        $this->json['success'] = trans('responses.accepted');

        return $this;
    }

    /**
     * Sets the status code to 403 and updates the message.
     *
     * @return self
     */
    public function unauthenticated()
    {
        $this->status(403);

        $this->json['error'] = trans('responses.unauthenticated');

        return $this;
    }

    /**
     * Sets the status code to 404 and updates the message.
     *
     * @return self
     */
    public function notFound()
    {
        $this->status(404);

        $this->json['error'] = trans('responses.not_found');

        return $this;
    }

    /**
     * Sets the status code to 422 and updates the message.
     *
     * @return self
     */
    public function unprocessable()
    {
        $this->status(422);

        $this->json['error'] = trans('responses.unprocessable');

        return $this;
    }

    /**
     * Sets the status code to 500 and updates the message.
     *
     * @return self
     */
    public function internalError()
    {
        $this->status(500);

        $this->json['error'] = trans('responses.internal_error');

        return $this;
    }

    /**
     * Sets the status code.
     *
     * @return self
     */
    public function status($code)
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * Sends the response.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        return response($this->json, $this->statusCode);
    }

    /**
     * Magic method to call the with* methods
     *
     * @param  string  $method
     * @param  array  $arguments
     * @return self
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $arguments)
    {
        if (strpos($method, 'with') !== false) {
            $key = str_replace('with', '', strtolower(($method)));

            $this->json[$key] = $arguments[0];

            return $this;
        }

        throw new BadMethodCallException("This class doesnt contain {$method} method.");
    }
}
