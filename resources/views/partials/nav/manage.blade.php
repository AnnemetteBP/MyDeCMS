<div class="side-menu has-shadow">
    <aside class="menu m-t-30 m-l-10">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a class="{{ Nav::isRoute('manage.dashboard') }}" href="{{ route('manage.dashboard') }}">Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li><a class="{{ Nav::isRoute('users.index') }}" href="{{ route('users.index') }}">Users</a></li>
            <b-collapse animation="fade">
                <div slot="trigger" slot-scope="props">
                    <p class="menu-label m-t-10">
                        Roles &amp; Permissions
                    </p>
                </div>
                <div class="submenu m-t-10">
                    <li><a class="{{ Nav::isRoute('roles.index') }}" href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a class="{{ Nav::isRoute('permissions.index') }}" href="{{ route('permissions.index') }}">Permissions</a></li>
                </div>
            </b-collapse>
        </ul>
    </aside>
</div>