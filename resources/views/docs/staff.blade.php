@extends('layouts.app')

@section('name', 'Student Resource&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'staff'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Staff resource</h1>

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

                    <p></p>

                    <h4>Response</h4>

                    <p>On success, this api call returns the <code>200 ok</code> status code and following json:</p>

                    <snippet>
{
    "data": {
        "id": 1
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
                                <td><code>?search</code></td>
                                <td>Search pattern</td>
                                <td>Searches in the table for desired results</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 id="creating">Creating</h3>

                    <p></p>

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
                                <td><code>staff_id</code></td>
                                <td><code>1</code></td>
                                <td>Required</td>
                                <td>The tutor id</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#creating') }}">successful creating</a> one in particular.</p>

                    <h3 id="updating">Updating</h3>

                    <p></p>

                    <h4>Arguments</h4>

                    <p>As request parameters, you can send any of the fields mentioned in the table above.</p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h3 id="deleting">Deleting</h3>

                    <p></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#deleting') }}">successful deleting</a> one in particular.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
