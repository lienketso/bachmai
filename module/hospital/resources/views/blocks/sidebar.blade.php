@php
    $listRoute = [
        'wadmin::hostpital.index.get', 'wadmin::hostpital.create.get', 'wadmin::hostpital.edit.get',
        'wadmin::hpost.index.get', 'wadmin::hpost.create.get', 'wadmin::hpost.edit.get'
    ];
    $indexRoute = ['wadmin::hostpital.index.get','wadmin::hostpital.create.get', 'wadmin::hostpital.edit.get'];
    $healthRoute = ['wadmin::hpost.index.get'];
    $createRoute = ['wadmin:::hpost.create.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-institution"></i> <span>Các viện & Khoa</span></a>
    <ul class="children">

        <li class="{{in_array(Route::currentRouteName(), $healthRoute) ? 'active' : '' }}"><a href="{{route('wadmin::hpost.index.get')}}">Danh sách viện & khoa</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::hpost.create.get')}}">Thêm mới</a></li>
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::hospital.index.get')}}">Danh mục viện & khoa</a></li>
    </ul>
</li>
