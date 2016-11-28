<div class="col-md-3">
    <h4>Getting started</h4>

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" {{ $current == 'oauth' ? 'class=active' : '' }}>
            <a href="{{ url('/docs') }}">Setting up an OAuth Client</a>
        </li>

        <li role="presentation" {{ $current == 'endpoints' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/endpoints') }}">List of Endpoints</a>
        </li>
    </ul>

    <hr>

    <h4>Consuming</h4>

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" {{ $current == 'requests' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/requests') }}">Requests</a>
        </li>

        <li role="presentation" {{ $current == 'responses' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/responses') }}">Responses</a>
        </li>
    </ul>

    <hr>

    <h4>Resources</h4>

    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" {{ $current == 'student' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/student') }}">Student</a>
        </li>

        <li role="presentation" {{ $current == 'staff' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/staff') }}">Staff</a>
        </li>

        <li role="presentation" {{ $current == 'sob' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/sob') }}">Sob</a>
        </li>

        <li role="presentation" {{ $current == 'lesson' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/lesson') }}">Lesson</a>
        </li>

        <li role="presentation" {{ $current == 'level' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/level') }}">Level</a>
        </li>

        <li role="presentation" {{ $current == 'topic' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/topic') }}">Topic</a>
        </li>

        <li role="presentation" {{ $current == 'week' ? 'class=active' : '' }}>
            <a href="{{ url('/docs/week') }}">Week</a>
        </li>
    </ul>
</div>
