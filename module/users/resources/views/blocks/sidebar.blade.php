@php
    $listRoute = [
        'wadmin::users.index.get', 'wadmin::users.create.get', 'wadmin::users.edit.get'
    ];
    $indexRoute = ['wadmin::users.index.get'];
    $createRoute = ['wadmin::users.create.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-users"></i> <span>Users</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::users.index.get')}}">Danh sách user</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::users.create.get')}}">Thêm mới</a></li>
    </ul>
</li>
