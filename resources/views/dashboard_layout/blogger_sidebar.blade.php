<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{$activePage == 'dashboard' ? 'active' : ''}}">
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{$activePage == 'blog' ? 'active' : ''}}">
            <a href="{{ route('blogger.posts.index') }}">
                <i class="material-icons">devices</i>
                <span>Blog Posts</span>
            </a>
        </li>

    </ul>
</div>