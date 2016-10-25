<?php

use Illuminate\Support\Facades\Artisan;

trait MakesAuthorizedJsonRequests
{
    /**
     * Stored api token.
     *
     * @var string
     */
    protected $token;

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
            'Authorization' => 'Bearer ' . $this->auth(),
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

    /**
     * Generates a single auth token.
     *
     * @return array
     */
    public function auth()
    {
        if (isset($this->token)) {
            return $this->token;
        }

        $user = factory(App\Models\User::class)->create();

        Artisan::call('passport:install');

        $this->token = $token = $user->createToken('Test')->accessToken;

        return $token;
    }
}
