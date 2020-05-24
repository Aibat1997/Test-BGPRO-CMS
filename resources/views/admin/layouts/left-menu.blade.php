<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> 
                    <a class="waves-effect waves-dark" href="/admin/tests" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Тесты</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="/admin/users" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Пользователи</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="/admin/role" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Роль пользователей</span></a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i>
        </a> 

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>