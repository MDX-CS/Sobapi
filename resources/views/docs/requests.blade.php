@extends('layouts.app')

@section('name', 'Setting up an OAuth Client&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'requests'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Making proper requests</h1>

                    <ul class="content-summary">
                        <li><a href="#authorization-header">Authorization Header</a></li>
                        <li><a href="#json-header">Json Header</a></li>
                    </ul>

                    <hr>

                    <h2 id="authorization-header">
                        <a href="#authorization-header">Authorization Header</a>
                    </h2>

                    <p>If you do not supply the access token via the <code>Authorization</code> header, you will be returned the <code>403 unaothorized</code> http status code. Using a <code>GuzzleHttp</code> library, you can use the following bit of code to attach the header:</p>

                    <snippet>
$client = new GuzzleHttp\Client;

$client->request('GET', 'http://10.14.66.51:8080/api/students', [
    'headers' => [
        'Authorization' => sprintf('Bearer %s', $access_token),
    ]
]);
                    </snippet>

                    <div class="beware">
                        Do not forget to replace the <code>access_token</code> variable with your valid access token. See how to <a href="{{ url('/docs#create-your-callback-script') }}">request a token</a> for more information.
                    </div>

                    <h2 id="json-header">
                        <a href="#json-header">Json Header</a>
                    </h2>

                    <p>There is one more rule you need to follow in order to get proper results - the <code>Accept</code> header has to be present on the request, and it has to be set to <code>application/json.</code> Again, with the <code>GuzzleHttp</code> library, you can use this code:</code></p>

                    <snippet>
$client = new GuzzleHttp\Client;

$client->request('GET', 'http://10.14.66.51:8080/api/students', [
    'headers' => [
        'Authorization' => sprintf('Bearer %s', $access_token),
        'Accept' => 'application/json',
    ]
]);
                    </snippet>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
