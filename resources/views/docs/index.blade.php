@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'oauth'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Setting up an Oauth Client</h1>

                    <ul class="content-summary">
                        <li><a href="#register-app-with-sobapi">Register the App with Sobapi</a></li>
                        <ul>
                            <li><a href="#login-to-sobapi">Login to Sobapi</a></li>
                            <li><a href="#register-an-oauth-client">Register an Oauth Client</a></li>
                        </ul>
                        <li><a href="#create-the-client-side-app">Create the Client-side App</a></li>
                        <ul>
                            <li>
                                <a href="#make-a-request-to-authorize-the-application">
                                    Make a Request to Authorize the Application
                                </a>
                            </li>
                            <li><a href="#create-your-callback-script">Create your Callback Script</a></li>
                            <li><a href="#request-an-access-token">Request an Access Token</a></li>
                            <li><a href="#consume-the-api">Cosnsume the Api!</a></li>
                        </ul>
                    </ul>

                    <hr>

                    <h2 id="register-app-with-sobapi">
                        <a href="#register-app-with-sobapi">Register the App with Sobapi</a>
                    </h2>

                    <h3 id="login-to-sobapi">Login to Sobapi</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h3 id="register-an-oauth-client">Register an Oauth Client</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h2 id="create-the-client-side-app">
                        <a href="#create-the-client-side-app">Create the Client-side App</a>
                    </h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h3 id="make-a-request-to-authorize-the-application">
                        Make a Request to Authorize the Application
                    </h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h3 id="create-your-callback-script">Create your Callback Script</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h3 id="request-an-access-token">Request an Access Token</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <h3 id="consume-the-api">Cosnsume the Api!</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet assumenda obcaecati dolor illo ut delectus vitae ea nulla possimus, neque maiores laboriosam, soluta similique fugiat aperiam quaerat incidunt. Consectetur.</p>

                    <snippet>@include('docs.snippets.test')</snippet>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
