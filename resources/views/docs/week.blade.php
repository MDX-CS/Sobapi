@extends('layouts.app')

@section('name', 'Student Resource&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'week'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Week resource</h1>

                    <ul class="content-summary">
                        <li><a href="#basic-operations">Basic operations</a></li>
                        <ul>
                            <li><a href="#viewing">Viewing</a></li>
                        </ul>
                    </ul>

                    <hr>

                    <h2 id="basic-operations">
                        <a href="#basic-operations">Basic operations</a>
                    </h2>

                    <h3 id="viewing">Viewing</h3>

                    <p>You can view the list of all weeks by sending a <code>GET|HEAD</code> request to the <code>api/weeks</code> uri. If you want to request just a specific week, send a <code>GET|HEAD</code> request to <code>api/weeks/{week}</code>, replacing the <code>week</code> wildcard with its <code>id</code>. You do not need any special authorization to perform this action, apart from having a valid access token.</p>

                    <h4>Response</h4>

                    <p>On success, this api call returns the <code>200 ok</code> status code and following json:</p>

                    <snippet>
{
    "data": {
        "id": 1,
        "week_start": {
            "date": "2016-10-03 00:00:00.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "week_end": {
            "date": "2016-10-07 00:00:00.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        }
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
                                <td><code>?start</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by the start date</td>
                            </tr>
                            <tr>
                                <td><code>?end</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by the end date</td>
                            </tr>
                            <tr>
                                <td><code>?search</code></td>
                                <td>Search pattern</td>
                                <td>Searches in the table for desired results</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="beware">
                        Note that this is a static resource and therefore is open for reading only.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
