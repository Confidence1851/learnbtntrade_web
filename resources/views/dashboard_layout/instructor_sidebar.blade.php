<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{$activePage == 'dashboard' ? 'active' : ''}}">
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{$activePage == 'instructor' ? 'active' : ''}}">
            <a href="{{ route('instructors.course.details.index') }}">
                <i class="material-icons">book</i>
                <span>Courses</span>
            </a>
        </li>

    </ul>
</div>