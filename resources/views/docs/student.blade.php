@extends('layouts.app')

@section('name', 'Student Resource&mdash;Documentation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'student'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Student resource</h1>

                    <ul class="content-summary">
                        <li><a href="#basic-operations">Basic operations</a></li>
                        <ul>
                            <li><a href="#viewing">Viewing</a></li>
                            <li><a href="#creating">Creating</a></li>
                            <li><a href="#updating">Updating</a></li>
                            <li><a href="#deleting">Deleting</a></li>
                        </ul>
                        <li><a href="#attendance">Attendance</a></li>
                        <ul>
                            <li><a href="#listing-attended-lessons">Listing attended lessons</a></li>
                            <li><a href="#toggling-attendance">Toggling attendance</a></li>
                        </ul>
                        <li><a href="#attendance">Timetable</a></li>
                        <ul>
                            <li><a href="#viewing-students-timetable">Viewing student's timetable</a></li>
                            <li><a href="#updating-timetable">Updating timetable</a></li>
                        </ul>
                        <li><a href="#observing-sobs">Observing sobs</a></li>
                        <ul>
                            <li><a href="#listing-observed-sobs">Listing observed sobs</a></li>
                            <li><a href="#toggling-sob-observation">Toggling sob observation</a></li>
                        </ul>
                    </ul>

                    <hr>

                    <h2 id="basic-operations">
                        <a href="#basic-operations">Basic operations</a>
                    </h2>

                    <h3 id="viewing">Viewing</h3>

                    <p>You can view the list of all students by sending a <code>GET|HEAD</code> request to the <code>api/students</code> uri. If you want to request just a specific student, send a <code>GET|HEAD</code> request to <code>api/students/{student}</code>, replacing the <code>student</code> wildcard with its <code>id</code>. You do not need any special authorization to perform this action, apart from having a valid access token.</p>

                    <h4>Response</h4>

                    <p>On success, this api call returns the <code>200 ok</code> status code and following json:</p>

                    <snippet>
{
    "data": {
        "id": 1,
        "tutor": {
            "id": 1,
            "first_name": "Jon",
            "last_name": "Doe",
            "email": "jon.doe@example.com",
        },
        "name": "jd123",
        "first_name": "Jane",
        "last_name": "Doe",
        "email": "jane.doe@example.com",
        "student_number": "M00123456",
        "visa": false,
        "foundation": false
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
                                <td>Orders results by their username</td>
                            </tr>
                            <tr>
                                <td><code>?first_name</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by the first name</td>
                            </tr>
                            <tr>
                                <td><code>?last_name</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by the last name</td>
                            </tr>
                            <tr>
                                <td><code>?email</code></td>
                                <td><code>asc|desc</code></td>
                                <td>Orders results by the email</td>
                            </tr>
                            <tr>
                                <td><code>?search</code></td>
                                <td>Search pattern</td>
                                <td>Searches in the table for desired results</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3 id="creating">Creating</h3>

                    <p>You are allowed to add new students by sending a <code>POST</code> requiest to the <code>api/students</code> uri. <strong>Note, however, that you need to be authorized to manage students to perform this action.</strong></p>

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
                            <tr>
                                <td><code>network_name</code></td>
                                <td><code>ab123</code></td>
                                <td>Required,&nbsp;Unique</td>
                                <td>The middlesex username</td>
                            </tr>
                            <tr>
                                <td><code>firstname</code></td>
                                <td><code>Jon</code></td>
                                <td>Required</td>
                                <td>The user's first name</td>
                            </tr>
                            <tr>
                                <td><code>lastname</code></td>
                                <td><code>Doe</code></td>
                                <td>Required</td>
                                <td>The user's last name</td>
                            </tr>
                            <tr>
                                <td><code>email</code></td>
                                <td><code>jon.doe@example.com</code></td>
                                <td>Required,&nbsp;Unique</td>
                                <td>The user's email</td>
                            </tr>
                            <tr>
                                <td><code>student_number</code></td>
                                <td><code>M00123456</code></td>
                                <td>Required,&nbsp;Unique</td>
                                <td>The user's student number</td>
                            </tr>
                            <tr>
                                <td><code>visa</code></td>
                                <td><code>1</code></td>
                                <td>Optional</td>
                                <td>Whether the given user is on visa</td>
                            </tr>
                            <tr>
                                <td><code>foundation</code></td>
                                <td><code>1</code></td>
                                <td>Optional</td>
                                <td>Whether the given user is in the foundation year</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#creating') }}">successful creating</a> one in particular.</p>

                    <h3 id="updating">Updating</h3>

                    <p>You can edit students by sending a <code>PUT|PATCH</code> request to the <code>api/students/{student}</code> uri. The <code>student</code> wildcard stands for the entry <code>id</code> <strong>Note, however, that you need to be authorized to manage students to perform this action.</strong></p>

                    <h4>Arguments</h4>

                    <p>As request parameters, you can send any of the fields mentioned in the table above.</p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h3 id="deleting">Deleting</h3>

                    <p>Upon sending a <code>DELETE</code> request to the <code>api/students/{student}</code> uri, you will delete the <code>student</code> under provided <code>id</code>. <strong>Note, however, that you need to be authorized to manage students to perform this action.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#deleting') }}">successful deleting</a> one in particular.</p>

                    <h2 id="attendance">
                        <a href="#attendance">Attendance</a>
                    </h2>

                    <h3 id="listing-attended-lessons">Listing attended lessons</h3>

                    <p>By accessing the <code>api/student/{student}/attendance</code> with a <code>GET|HEAD</code> request, you will be provided the given student's attendance. <strong>Note that in order to access this route, you either have to be authorized to manage students, or have to be logged in as the student whose timetable you are trying to access.</strong></p>

                    <h4>Response</h4>

                    <p>This call returns an array of <a href="{{ url('/docs/lesson#viewing') }}">lesson</a> json objects.</p>

                    <h3 id="toggling-attendance">Toggling attendance</h3>

                    <p>You can toggle student's attendance for a lesson by sending a <code>PUT|PATCH</code> request to the <code>api/students/{student}/attendance/{lesson}</code> uri, where the <code>student</code> wildcard is the student's <code>id</code> and the <code>lesson</code> wildcard is the lesson <code>id</code> respectively. <strong>In orded to access this api call, you need to be authorized to toggle attendance.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h2 id="timetable">
                        <a href="#timetable">Timetable</a>
                    </h2>

                    <h3 id="viewing-students-timetable">Viewing student's timetable</h3>

                    <p>You are allowed to view student's timetable by sending a <code>GET|HEAD</code> request to the <code>api/students/{student}/timetable</code> uri, where the <code>students</code> wildcard stands for the student's <code>id</code>. <strong>Note, hoewever, that you have to be either authorized to manage students, or have to be logged in as the student whose timetable you are trying to access.</strong></p>

                    <h4>Response</h4>

                    <p>This call returns an array of <a href="{{ url('/docs/lesson#viewing') }}">lesson</a> json objects.</p>

                    <h3 id="updating-timetable">Updating attendance</h3>

                    <p>Upon sending the <code>PUT|PATCH</code> request to the <code>api/students/{student}/timetable/{lesson}</code> uri, you will toggle the given lesson's apperance on the student's timetable. Again, the <code>student</code> wildcard stands for the student's <code>id</code> and the <code>lesson</code> wildcard stands for the lesson's <code>id</code> respectively. <strong>Note that you have to be authorized to manage students to access this route.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                    <h2 id="observing-sobs">
                        <a href="#observing-sobs">Observing sobs</a>
                    </h2>

                    <h3 id="#listing-observed-sobs">Listing observed sobs</h3>

                    <p>To view all the sobs observed by a student, simply send a <code>GET|HEAD</code> request to the <code>api/students/{student}/sobs</code> uri, where the <code>student</code> wildrcard stands for the student's <code>id</code>. <strong>Note that in order to make this api call, you need to either be authorized to observe sobs, or be logged in as the student whose sobs you are requesting.</strong></p>

                    <h4>Response</h4>

                    <p>When successful, this request will return an array of the <a href="{{ url('/docs/sob#viewing') }}">sob resource</a> objects.</p>

                    <h3 id="#toggling-sob-observation">Toggling sob observation</h3>

                    <p>Upon sending the <code>PUT|PATCH</code> request to the <code>api/students/{student}/sobs/{sob}</code> uri, you can toggle the observation status of a sob for the given student. Again, the <code>student</code> wildcard stands for the student's <code>id</code> and the <code>sob</code> wildcard stands for the sob <code>id</code>. <strong>You need to be authorized to observe sobs in order to access this route.</strong></p>

                    <h4>Response</h4>

                    <p>See documentation on <a href="{{ url('/docs/responses') }}">http responses</a>, the <a href=" {{url('/docs/responses#updating') }}">successful updating</a> one in particular.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
