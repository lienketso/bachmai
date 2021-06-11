@php
    $listRoute = [
        'wadmin::setting.index.get','wadmin::setting.donate.get'
    ];
    $indexRoute = ['wadmin::setting.index.get'];
    $donateRoute = ['wadmin::setting.donate.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-gears"></i> <span>Cấu hình</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.index.get')}}">Cấu hình chung</a></li>
        <li class="{{in_array(Route::currentRouteName(), $donateRoute) ? 'active' : '' }}"><a href="{{route('wadmin::setting.donate.get')}}">Trang ủng hộ</a></li>
    </ul>
</li>

