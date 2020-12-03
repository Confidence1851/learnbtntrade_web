<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{$activePage == 'dashboard' ? 'active' : ''}}">
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{$activeGroup == 'blog' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">devices</i>
                <span>Blog</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'category' ? 'active' : ''}}">
                    <a href="{{ route('blog.categories.index') }}">Blog Categories</a>
                </li>
                <li class="{{$activePage == 'post' ? 'active' : ''}}">
                    <a href="{{ route('blog.posts.index') }}">Blog Posts</a>
                </li>
            </ul>
        </li>

        <li class="{{$activeGroup == 'course' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">book</i>
                <span>Courses</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'course_category' ? 'active' : ''}}">
                    <a href="{{ route('course.categories.index') }}">Course Categories</a>
                </li>
                <li class="{{$activePage == 'course_all' ? 'active' : ''}}">
                    <a href="{{ route('course.details.index') }}">Course Details</a>
                </li>
                <li class="{{$activePage == 'assignments' ? 'active' : ''}}">
                    <a href="{{ route('course.assignments.index') }}">Course Assignments</a>
                </li>
            </ul>
        </li>

        <li class="{{$activePage == 'bloggers' ? 'active' : ''}}">
            <a href="{{ route('bloggers.index') }}">
                <i class="material-icons">home</i>
                <span>Bloggers</span>
            </a>
        </li>


        <li class="{{$activeGroup == 'instructors' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">supervisor_account</i>
                <span>Instructors</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'all' ? 'active' : ''}}">
                    <a href="{{ route('instructors.index') }}">All Instructors</a>
                </li>
                <li class="{{$activePage == 'requests' ? 'active' : ''}}">
                    <a href="{{ route('instructors.requests') }}">Instructor Requests</a>
                </li>
            </ul>
        </li>


        <li class="{{$activeGroup == 'users_management' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">person</i>
                <span>Users</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'users' ? 'active' : ''}}">
                    <a href="{{ route('users.index') }}">All Users</a>
                </li>
                <li class="{{$activePage == 'enrolled' ? 'active' : ''}}">
                    <a href="{{ route('users.enrolled') }}">Enrolled Users</a>
                </li>
                <li class="{{$activePage == 'unenrolled' ? 'active' : ''}}">
                    <a href="{{ route('users.unenrolled') }}">Unenrolled Users</a>
                </li>
            </ul>
        </li>

        <li class="{{$activePage == 'orders' ? 'active' : ''}}">
            <a href="{{ route('orders.index') }}">
                <i class="material-icons">shopping_cart</i>
                <span>Orders</span>
            </a>
        </li>


        <li class="{{$activeGroup == 'services' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">store</i>
                <span>Services</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'plans' ? 'active' : ''}}">
                    <a href="{{ route('service.plans.index') }}">Plans</a>
                </li>
                <li class="{{$activePage == 'subscriptions' ? 'active' : ''}}">
                    <a href="{{ route('service.subscriptions.index') }}">Plan Subcriptions</a>
                </li>

                {{-- <li class="{{$activePage == 'signal_updates' ? 'active' : ''}}">
                    <a href="#">Signal Updates</a>
                </li> --}}
            </ul>
        </li>

        <li class="{{$activeGroup == 'withdrawals' ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">store</i>
                <span>Withdrawals</span>
            </a>
            <ul class="ml-menu">
                <li class="{{$activePage == 'paid' ? 'active' : ''}}">
                    <a href="{{ route('withdrawals.index') }}">Paid</a>
                </li>
                <li class="{{$activePage == 'pending' ? 'active' : ''}}">
                    <a href="{{ route('pending_withdrawals') }}">Pending</a>
                </li>

                {{-- <li class="{{$activePage == 'signal_updates' ? 'active' : ''}}">
                    <a href="#">Signal Updates</a>
                </li> --}}
            </ul>
        </li>



        <li class="header">INTERACTIONS</li>
{{--
        <li class="{{$activeGroup == 'adverts' ? 'active' : ''}}">
            <a href="{{ route('adverts.index') }}">
                <i class="material-icons col-amber">rss_feed</i>
                <span>Advertisements</span>
            </a>
        </li>
        <li class="{{$activeGroup == 'annoucements' ? 'active' : ''}}">
            <a href="javascript:void(0);">
                <i class="material-icons col-light-blue">volume_up</i>
                <span>Annoucements</span>
            </a>
        </li> --}}

        <li class="{{$activeGroup == 'testimonials' ? 'active' : ''}}">
            <a href="{{ route('testimonials.index') }}">
                <i class="material-icons col-amber">rss_feed</i>
                <span>Testimonials</span>
            </a>
        </li>

        <li class="{{$activeGroup == 'subscribers' ? 'active' : ''}}">
            <a href="{{ route('newsletters.index') }}">
                <i class="material-icons col-light-green">volume_up</i>
                <span>Newsletter Subscribers</span>
            </a>
        </li>

        <li class="{{$activeGroup == 'referrals' ? 'active' : ''}}">
            <a href="{{ route('referrals.index') }}">
                <i class="material-icons col-red">volume_up</i>
                <span>Referrals</span>
            </a>
        </li>
        <hr>
        {{-- <li class="{{$activeGroup == 'logs' ? 'active' : ''}}">
        <a href="{{ route('logs.index') }}">
                <i class="material-icons col-red">donut_large</i>
                <span>Logs</span>
            </a>
        </li> --}}
    </ul>
</div>