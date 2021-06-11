@php
    $listRoute = [
        'wadmin::menu.index.get', 'wadmin::menu.category.get', 'wadmin::menu.edit.get'
    ];
    $indexRoute = ['wadmin::menu.index.get'];
    $createRoute = ['wadmin::menu.create.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-th-list"></i> <span>Menu</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::menu.index.get')}}">Danh sách menu</a></li>
    </ul>
</li>
