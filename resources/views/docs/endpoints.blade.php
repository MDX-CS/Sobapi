@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                @include('docs.partials.side-menu', ['current' => 'endpoints'])

                <div class="col-md-8 col-md-offset-1 documentation">
                    <h1>Listing of all available endpoints</h1>

                    <ul class="content-summary">
                        <li><a href="#student-routes">Student routes</a></li>
                        <li><a href="#staff-routes">Staff routes</a></li>
                        <li><a href="#sob-routes">Sob routes</a></li>
                        <li><a href="#lesson-routes">Lesson routes</a></li>
                        <li><a href="#level-routes">Level routes</a></li>
                        <li><a href="#topic-routes">Topic routes</a></li>
                        <li><a href="#week-routes">Week routes</a></li>
                    </ul>

                    <hr>

                    <h2 id="student-routes">
                        <a href="#student-routes">Student routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><a href="{{ url('/docs/student#viewing') }}"><code>api/students</code></a></td>
                                <td>Returns all students</td>
                            </tr>
                            <tr>
                                <td><code>POST</code></td>
                                <td><a href="{{ url('/docs/student#creating') }}"><code>api/students</code></a></td>
                                <td>Stores a new student</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td>
                                    <a href="{{ url('/docs/student#viewing') }}">
                                        <code>api/students/{student}</code>
                                    </a>
                                </td>
                                <td>Returns given student</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td>
                                    <a href="{{ url('/docs/student#deleting') }}">
                                        <code>api/students/{student}</code>
                                    </a>
                                </td>
                                <td>Removes given student</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td>
                                    <a href="{{ url('/docs/student#updating') }}">
                                        <code>api/students/{student}</code>
                                    </a>
                                </td>
                                <td>Updates given student</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/students/{student}/attendance</code></td>
                                <td>Returns the given student's attendance</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/students/{student}/attendance/{attendance}</code></td>
                                <td>Toggles the attendance for given student</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/students/{student}/sobs</code></td>
                                <td>Returns all sobs observed for given student</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/students/{student}/sobs/{sob}</code></td>
                                <td>Updates given sob</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/students/{student}/timetable</code></td>
                                <td>Returns given student's timetable</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/students/{student}/timetable/{timetable}</code></td>
                                <td>Toggle presence of a lesson on given student's timetable</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="staff-routes">
                        <a href="#staff-routes">Staff routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/staff</code></td>
                                <td>Returns all members of staff</td>
                            </tr>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/staff</code></td>
                                <td>Stores a new staf</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/staff/{staff}</code></td>
                                <td>Returns given staff</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/staff/{staff}</code></td>
                                <td>Updates given staff</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/staff/{staff}</code></td>
                                <td>Removes given staff</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="sob-routes">
                        <a href="#sob-routes">Sob routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/sobs</code></td>
                                <td>Returns all sobs</td>
                            </tr>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/sobs</code></td>
                                <td>Stores a new sob</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/sobs/{sob}</code></td>
                                <td>Returns given sob</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/sobs/{sob}</code></td>
                                <td>Updates given sob</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/sobs/{sob}</code></td>
                                <td>Removes given sob</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="lesson-routes">
                        <a href="#lesson-routes">Lesson routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/lessons</code></td>
                                <td>Stores a new lesson</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/lessons</code></td>
                                <td>Returns all lessons</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/lessons/{lesson}</code></td>
                                <td>Returns given lesson</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/lessons/{lesson}</code></td>
                                <td>Updates given lesson</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/lessons/{lesson}</code></td>
                                <td>Removes given lesson</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="level-routes">
                        <a href="#level-routes">Level routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/levels</code></td>
                                <td>Stores a new level</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/levels</code></td>
                                <td>Returns all levels</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/levels/{level}</code></td>
                                <td>Removes given level</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/levels/{level}</code></td>
                                <td>Updates given level</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/levels/{level}</code></td>
                                <td>Returns given level</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/levels/{level}/sobs</code></td>
                                <td>Returns all sobs under given difficulty</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/levels/{level}/sobs/{sob}</code></td>
                                <td>Assigns a level to given sob</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="topic-routes">
                        <a href="#topic-routes">Topic routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/topics</code></td>
                                <td>Returns all topics</td>
                            </tr>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/topics</code></td>
                                <td>Stores a new topic</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/topics/{topic}</code></td>
                                <td>Removes given topic</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/topics/{topic}</code></td>
                                <td>Updates given topic</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/topics/{topic}</code></td>
                                <td>Returns given topic</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/topics/{topic}/sobs</code></td>
                                <td>Returns all sobs under given category</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/topics/{topic}/sobs/{sob}</code></td>
                                <td>Assigns a topic to given sob</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 id="week-routes">
                        <a href="#week-routes">Week routes</a>
                    </h2>

                    <table class="table table-default">
                        <thead>
                            <tr>
                                <th>Method</th>
                                <th>Uri</th>
                                <th>Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/weeks</code></td>
                                <td>Returns all weeks</td>
                            </tr>
                            <tr>
                                <td><code>POST</code></td>
                                <td><code>api/weeks</code></td>
                                <td>Stores a new week</td>
                            </tr>
                            <tr>
                                <td><code>DELETE</code></td>
                                <td><code>api/weeks/{week}</code></td>
                                <td>Removes given week</td>
                            </tr>
                            <tr>
                                <td><code>PUT|PATCH</code></td>
                                <td><code>api/weeks/{week}</code></td>
                                <td>Updates given week</td>
                            </tr>
                            <tr>
                                <td><code>GET|HEAD</code></td>
                                <td><code>api/weeks/{week}</code></td>
                                <td>Returns all week</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
