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
                    </ul>

                    <hr>

                    <h2 id="register-app-with-sobapi">
                        <a href="#register-app-with-sobapi">Register the App with Sobapi</a>
                    </h2>

                    <h3 id="login-to-sobapi">Login to Sobapi</h3>

                    <p>In order to make an OAuth client, you need to be eligible to login to the univerity system. Then simply hit the <strong>Login</strong> link in the upper left corner of the page and enter your university credentials.</p>

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

return header('Location: http://sobapi.dev:8000/oauth/authorize?' . $query);
                    </snippet>

                    <p><strong>Make sure to replace the </strong><code>app_id</code> <strong>variable with you application id.</strong></p>

                    <p>This script is going to send a <code>GET</code> request to the <em>Sobapi</em> backend and try to authorize the application. It will make the user enter their credentials and allow the application to access their data. If all goes well, you will be redirected back to your application to the <strong>Redirect URL</strong> you specified. Suppose that for testing purposes we put in <code>http://test.app/callback.php</code>.</p>


                    <h3 id="create-your-callback-script">Create your Callback Script</h3>

                    <p>Now it is time to handle the <em>Sobapi</em> response. Let's suppose we created a <code>callback.php</code> script on the test app. Put in following contents:</p>

                    <snippet>
$http = new GuzzleHttp\Client;

$response = $http->post('http://sobapi.dev/oauth/token', [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'client_id' => $app_id,
        'client_secret' => $app_secret,
        'redirect_uri' => 'http://test.app/callback.php',
        'code' => $_GET['code'],
    ],
]);
                    </snippet>

                    <p><strong>I pulled in the </strong><code>GuzzleHttp</code> <strong>library to make our life easier when making http requests.</strong></p>

                    <p>Here we just grab the code that was returned from previous request and using that, your <code>app_id</code> and your <code>app_secret</code>, we are going to make a post request to the <em>Sobapi</em>, to receive the desired <strong>access token</strong>. Note that we are specifying the <code>redirect_uri</code> for security purposes.</p>

                    <p>The json that we get from <code>json_decode((string) $response->getBody(), true)</code> looks following: </p>

                    <snippet>

                    </snippet>

                    <h3 id="consume-the-api">Cosnsume the Api!</h3>

                    <p>You are now well prepared to consume the <em>Sobapi</em> on behalf of the logged in user. See documentation on how to make <a href="{{ url('/docs/requests') }}">proper requests</a> now.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
