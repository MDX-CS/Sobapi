$query = http_build_query([
    'client_id' => 3,
    'redirect_uri' => 'http://tests.dev:8000/callback.php',
    'response_type' => 'code',
    'scope' => '',
]);

return header('Location: http://sobapi.dev:8000/oauth/authorize?' . $query);

$http = new GuzzleHttp\Client;

$response = $http->post('http://sobapi.dev/oauth/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'client_id' => 3,
        'client_secret' => 'km23LZmhMmLgLEd6aAGf50sRCls2O2HJP1yjy6rk',
        'redirect_uri' => 'http://tests.dev:8000/callback.php',
        'code' => $_GET['code'],
    ],
]);

var_dump(json_decode((string) $response->getBody(), true));
