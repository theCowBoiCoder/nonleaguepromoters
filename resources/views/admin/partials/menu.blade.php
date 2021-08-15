<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item active ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Users</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('admin.users.all')}}">View All</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>News</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('admin.news.create')}}">Create</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('admin.news.all')}}">View All</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Messages</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('admin.messages.send')}}">Send</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('admin.messages.all')}}">View All</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Marketing</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('admin.marketing.seo.viewall')}}">View All SEO</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('admin.marketing.seo.create')}}">Create SEO Details</a>
            </li>

        </ul>
    </li>
    <li class="sidebar-title"><a href="{{route('home')}}">Back To Main Site</a></li>
</ul>
