<?php

trait MakesRequestsWithHeaders
{
    /**
     * Generates a authed json request.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $params
     * @param  array  $headers
     * @return \Illuminate\Http\Response
     */
    public function request($method, $uri, $params = [], $headers = [])
    {
        $headers = array_merge($headers, [
            'Accept' => 'application/json',
        ]);

        return $this->call(
            $method,
            $uri,
            $params,
            [],
            [],
            $this->transformHeadersToServerVars($headers)
        );
    }
}
