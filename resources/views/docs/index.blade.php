@extends('layouts.app')

@section('name', 'Setting up an OAuth Client&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'oauth'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Setting up an OAuth Client</h1>

                    <ul class="content-summary">
                        <li><a href="#register-app-with-sobapi">Register the App with Sobapi</a></li>
                        <ul>
                            <li><a href="#login-to-sobapi">Login to Sobapi</a></li>
                            <li><a href="#register-an-oauth-client">Register an OAuth Client</a></li>
                        </ul>
                        <li><a href="#create-the-client-side-app">Create the Client-side App</a></li>
                        <ul>
                            <li>
                                <a href="#make-a-request-to-authorize-the-application">
                                    Make a Request to Authorize the Application
                                </a>
                            </li>
                            <li><a href="#create-your-callback-script">Create your Callback Script</a></li>
                            <li><a href="#consume-the-api">Cosnsume the Api!</a></li>
                        </ul>
                        <li><a href="#personal-access-tokens">Personal Access Tokens</a></li>
                    </ul>

                    <hr>

                    <h2 id="register-app-with-sobapi">
                        <a href="#register-app-with-sobapi">Register the App with Sobapi</a>
                    </h2>

                    <h3 id="login-to-sobapi">Login to Sobapi</h3>

                    <p>In order to make an OAuth client, you need to be eligible to login to the univerity system. Then simply hit the <strong>Login</strong> link in the upper right corner of the page and enter your university credentials.</p>

                    <h3 id="register-an-oauth-client">Register an OAuth Client</h3>

                    <p>After having logged in, open the dropdown by clicking on your name and navigate to the <strong>Applications</strong> page. If this is the first time that you access this page, all you should see is an empty list of OAuth clients. Click on <strong>Create New Client</strong> button and fill out the <strong>Name</strong> (name of your app) and the <strong>Redirect URL</strong> (url that will be called after authorizing your application)</p>

                    <h2 id="create-the-client-side-app">
                        <a href="#create-the-client-side-app">Create the Client-side App</a>
                    </h2>

                    <p>If you successfully registered you app with <em>Sobapi</em>, you are good to proceed to creating the client side application.</p>

                    <h3 id="make-a-request-to-authorize-the-application">
                        Make a Request to Authorize the Application
                    </h3>

                    <p>Make a script in your application, for our purposes, bare <em>php</em> is good enough. I will call my script <code>index.php</code>, so the url will be <code>http://test.app</code>. Put the following code in:</p>

                    <snippet>
$query = http_build_query([
    'client_id' => $app_id,
    'redirect_uri' => 'http://test.app/callback.php',
    'response_type' => 'code',
]);

return header('Location: http://10.14.66.51:8080/oauth/authorize?' . $query);
                    </snippet>

                    <div class="beware">
                        Make sure to replace the <code>app_id</code> variable with you application id.
                    </div>

                    <p>This script is going to send a <code>GET</code> request to the <em>Sobapi</em> backend and try to authorize the application. It will make the user enter their credentials and allow the application to access their data. If all goes well, you will be redirected back to your application to the <strong>Redirect URL</strong> you specified. Suppose that for testing purposes we put in <code>http://test.app/callback.php</code>.</p>


                    <h3 id="create-your-callback-script">Create your Callback Script</h3>

                    <p>Now it is time to handle the <em>Sobapi</em> response. Let's suppose we created a <code>callback.php</code> script on the test app and also pulled in the <code>GuzzleHttp</code> library. Put in following contents:</p>

                    <snippet>
$client = new GuzzleHttp\Client;

$response = $client->post('http://10.14.66.51:8080/oauth/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'client_id' => $app_id,
        'client_secret' => $app_secret,
        'redirect_uri' => 'http://test.app/callback.php',
        'code' => $_GET['code'],
    ],
]);
                    </snippet>

                    <p>Here we just grab the code that was returned from previous request and using that, your <code>app_id</code> and your <code>app_secret</code>, we are going to make a post request to the <em>Sobapi</em>, to receive the desired <strong>access token</strong>. Note that we are specifying the <code>redirect_uri</code> for security purposes.</p>

                    <p>The json that we get from <code>json_decode((string) $response->getBody(), true)</code> looks following: </p>

                    <snippet>
{
    "access_token": "e073837eea7acddc629fac7eb4ad72b7",
    "refresh_token": "9dd4e461268c8034f5c8564e155c67a6",
    "expires_in": 86400
}
                    </snippet>

                    <h3 id="consume-the-api">Cosnsume the Api!</h3>

                    <p>You are now well prepared to consume the <em>Sobapi</em> on behalf of the logged in user. See documentation on how to make <a href="{{ url('/docs/requests') }}">proper requests</a> now.</p>

                    <h2 id="personal-access-tokens">
                        <a href="#personal-access-tokens">Personal Access Tokens</a>
                    </h2>

                    <p>For testing and personal purposes, you can issue a personal access token. Simply login and open the dropdown menu by clicking on your name in the upper right corner and select <em>Personal Tokens</em> link. All you need to do there is to click on the <em>Create New Token</em> button and enter its name. The access token will be shown <strong>only once</strong>. Simply copy the token and use it in the <code>Authorization</code> header.</p>

                    <div class="beware">Note that the token will have the same access rights as the user who created it.</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
