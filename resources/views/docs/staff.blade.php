@extends('layouts.app')

@section('name', 'Staff Resource&mdash;Documentation')

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

                    <p>You can view the list of all staff by sending a <code>GET|HEAD</code> request to the <code>api/staff</code> uri. If you want to request just a specific member of staff, send a <code>GET|HEAD</code> request to <code>api/staff/{staff}</code>, replacing the <code>staff</code> wildcard with its <code>id</code>. You do not need any special authorization to perform this action, apart from having a valid access token.</p>

                    <h4>Response</h4>

                    <p>On success, this api call returns the <code>200 ok</code> status code and following json:</p>

                    <snippet>
{
    "data": {
        "id": 1,
        "first_name": "Jon",
        "last_name": "Doe",
        "email": "jon.doe@example.com"
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
                                <td><code>?first_name</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by their first name</td>
                            </tr>
                            <tr>
                                <td><code>?last_name</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by their last name</td>
                            </tr>
                            <tr>
                                <td><code>?email</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by their email</td>
                            </tr>
                            <tr>
                                <td><code>?search</code></td>
                                <td>Search pattern</td>
                                <td>Searches in the table for desired results</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 id="creating">Creating</h3>

                    <p>You are allowed to add new staff members by sending a <code>POST</code> requiest to the <code>api/staff</code> uri. <strong>Note, however, that you need to be authorized to manage staff to perform this action.</strong></p>

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
                                <td><code>network_name</code></td>
                                <td><code>jd132</code></td>
                                <td>Required, Unique</td>
                                <td>The staff member's username</td>
                            </tr>
                            <tr>
                                <td><code>firstname</code></td>
                                <td><code>Jon</code></td>
                                <td>Required</td>
                                <td>The staff member's first name</td>
                            </tr>
                            <tr>
                                <td><code>lastname</code></td>
                                <td><code>Doe</code></td>
                                <td>Required</td>
                                <td>The staff member's last name</td>
                            </tr>
                            <tr>
                                <td><code>email</code></td>
                                <td><code>jon.doe@example.com</code></td>
                                <td>Required, Unique</td>
                                <td>The staff member's email</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#creating') }}">successful creating</a> one in particular.</p>

                    <h3 id="updating">Updating</h3>

                    <p>You can edit staff members by sending a <code>PUT|PATCH</code> request to the <code>api/staff/{staff}</code> uri. The <code>staff</code> wildcard stands for the entry <code>id</code> <strong>Note, however, that you need to be authorized to manage staff to perform this action.</strong></p>

                    <h4>Arguments</h4>

                    <p>As request parameters, you can send any of the fields mentioned in the table above.</p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h3 id="deleting">Deleting</h3>

                    <p>Upon sending a <code>DELETE</code> request to the <code>api/staff/{staff}</code> uri, you will delete the <code>staff</code> under provided <code>id</code>. <strong>Note, however, that you need to be authorized to manage staff to perform this action.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#deleting') }}">successful deleting</a> one in particular.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
