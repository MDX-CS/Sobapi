@extends('layouts.app')

@section('name', 'Topic Resource&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'topic'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Topic resource</h1>

                    <ul class="content-summary">
                        <li><a href="#basic-operations">Basic operations</a></li>
                        <ul>
                            <li><a href="#viewing">Viewing</a></li>
                            <li><a href="#creating">Creating</a></li>
                            <li><a href="#updating">Updating</a></li>
                            <li><a href="#deleting">Deleting</a></li>
                        </ul>
                    </ul>

                    <hr>

                    <h2 id="basic-operations">
                        <a href="#basic-operations">Basic operations</a>
                    </h2>

                    <h3 id="viewing">Viewing</h3>

                    <p>You can view the list of all topics by sending a <code>GET|HEAD</code> request to the <code>api/topics</code> uri. If you want to request just a specific topic, send a <code>GET|HEAD</code> request to <code>api/topics/{topic}</code>, replacing the <code>topic</code> wildcard with its <code>id</code>. You do not need any special authorization to perform this action, apart from having a valid access token.</p>

                    <h4>Response</h4>

                    <p>On success, this api call returns the <code>200 ok</code> status code and following json:</p>

                    <snippet>
{
    "data": {
        "id": 1,
        "name": "Synoptics"
    }
}
                    </snippet>

                    <p>Note that when requesting all resources, an array of these objects will rather be returned.</p>

                    <h4>Filtering</h4>

                    <p>By adding one of the query strings specified below to the uri, you may search in the results or order them.</p>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Query</th>
                                <th>Value</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>?id</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by their id</td>
                            </tr>
                            <tr>
                                <td><code>?name</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by their name</td>
                            </tr>
                            <tr>
                                <td><code>?search</code></td>
                                <td>Search pattern</td>
                                <td>Searches in the table for desired results</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 id="creating">Creating</h3>

                    <p>You are allowed to add new topics by sending a <code>POST</code> requiest to the <code>api/topics</code> uri. <strong>Note, however, that you need to be authorized to manage topics to perform this action.</strong></p>

                    <h4>Arguments</h4>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Argument</th>
                                <th>Example</th>
                                <th>Constraints</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>name</code></td>
                                <td><code>Synoptics</code></td>
                                <td>Required</td>
                                <td>The topic name</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#creating') }}">successful creating</a> one in particular.</p>

                    <h3 id="updating">Updating</h3>

                    <p>You can edit topics by sending a <code>PUT|PATCH</code> request to the <code>api/topics/{topic}</code> uri. The <code>topic</code> wildcard stands for the entry <code>id</code> <strong>Note, however, that you need to be authorized to manage topics to perform this action.</strong></p>

                    <h4>Arguments</h4>

                    <p>As request parameters, you can send any of the fields mentioned in the table above.</p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h3 id="deleting">Deleting</h3>

                    <p>Upon sending a <code>DELETE</code> request to the <code>api/topics/{topic}</code> uri, you will delete the <code>topic</code> under provided <code>id</code>. <strong>Note, however, that you need to be authorized to manage topics to perform this action.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#deleting') }}">successful deleting</a> one in particular.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
