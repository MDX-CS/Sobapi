@extends('layouts.app')

@section('name', 'Responses&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'responses'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Responses</h1>

                    <ul class="content-summary">
                        <li><a href="#success-responses">Success Responses</a></li>
                        <ul>
                            <li><a href="#viewing">Viewing</a></li>
                            <li><a href="#creating">Creating</a></li>
                            <li><a href="#updating">Updating</a></li>
                            <li><a href="#deleting">Deleting</a></li>
                        </ul>
                        <li><a href="#client-error-responses">Client Error Responses</a></li>
                        <ul>
                            <li><a href="#unauthenticated">Unauthenticated</a></li>
                            <li><a href="#unauthorized">Unauthorized</a></li>
                            <li><a href="#not_found">Not Found</a></li>
                            <li><a href="#unprocessable">Unprocessable</a></li>
                        </ul>
                        <li><a href="#server-error-responses">Server Error Responses</a></li>
                        <ul>
                            <li><a href="#internal_error">Internal Error</a></li>
                        </ul>
                    </ul>

                    <hr>

                    <h2 id="success-responses">
                        <a href="#success-responses">Success Responses</a>
                    </h2>

                    <h3 id="viewing">Viewing</h3>

                    <p>The best thing after requesting to view a resource is to get a <code>200 ok</code> http status and a response which is <strong>specific</strong> to each resource. There is, however, one thing in common, and it is that all the responses have the <code>data</code> attribute, containing the data. This attribute either contains a resource object, or an array of those objects.</p>

                    <snippet>
{
    "data": [
        ...
    ]
}
                    </snippet>

                    <h3 id="creating">Creating</h3>

                    <p>Upon successfully persisting a resource on the database, you will be provided with a <code>201 created</code> http status code and a following json response:</p>

                    <snippet>
{
    "sucess": {
        "message": "Your entry was successfully stored."
    }
}
                    </snippet>

                    <h3 id="updating">Updating</h3>

                    <p>If you were to successfully update an entry on the databse, the <code>202 accepted</code> http status code is going to be returned, along with this json:</p>

                    <snippet>
{
    "sucess": {
        "message": "Your entry was successfully edited."
    }
}
                    </snippet>

                    <h3 id="deleting">Deleting</h3>

                    <p>When removing a resource, on success you will be given a <code>202 accepted</code> http status code and a bit of json similar to this one:</p>

                    <snippet>
{
    "sucess": {
        "message": "Resource successfully deleted."
    }
}
                    </snippet>

                    <h2 id="client-error-responses">
                        <a href="#client-error-responses">Client Error Responses</a>
                    </h2>

                    <h3 id="#unauthenticated">Unauthenticated</h3>

                    <p>This is a client error which is thrown whenever the api is accessed without a valid access token. It returns a <code>403 forbidden</code> http status code along with the following bit of json:</p>

                    <snippet>
{
    "error": {
        "message": "Your access token is not valid."
    }
}
                    </snippet>

                    <h3 id="#unauthorized">Unauthorized</h3>

                    <p>Whenever you see following <code>403 forbidden</code> response, make sure you have the correct access rights for the given api call. See the documentation on resources for more information on necessary authorization.</p>

                    <snippet>
{
    "error": {
        "message": "You are not authorized to perform this action."
    }
}
                    </snippet>

                    <h3 id="#not_found">Not Found</h3>

                    <p>The notorious <code>404 not found</code> http status code is returned whenever you either accessed a route which does not exist, or requetsed a non-existing resource. Following json is enclosed:</p>

                    <snippet>
{
    "error": {
        "message": "Desired resource was not found."
    }
}
                    </snippet>

                    <h3 id="#unprocessable">Unprocessable</h3>

                    <p>Make sure the formating of your request is proper when receiving the <code>422 unprocessable entity</code> http status code, along with following json:</p>

                    <snippet>
{
    "error": {
        "message": "Your data structure is invalid."
    }
}
                    </snippet>

                    <h2 id="server-error-responses">
                        <a href="#server-error-responses">Server Error Responses</a>
                    </h2>

                    <h3 id="#internal-error">Internal Error</h3>

                    <p>You should not be seing this very often, but whenever anything goes wrong on our end, you will be given the <code>500 internal error</code> http status code, as well as the following json:</p>

                    <snippet>
{
    "error": {
        "message": "We are experiencing major issues on our servers. Try again later."
    }
}
                    </snippet>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
