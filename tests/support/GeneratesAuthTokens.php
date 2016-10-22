<?php

use Illuminate\Support\Facades\Artisan;

trait GeneratesAuthTokens
{
    /**
     * Generates a single auth token.
     *
     * @return array
     */
    public function auth()
    {
        $user = factory(App\Models\User::class)->create();

        Artisan::call('passport:install');

        $token = $user->createToken('Test')->accessToken;

        return $this->transformHeadersToServerVars([
            'Authorization' => 'Bearer ' . $token,
        ]);
    }
}
