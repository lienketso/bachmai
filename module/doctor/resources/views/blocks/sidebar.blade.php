@php
    $listRoute = [
        'wadmin::doctor.index.get', 'wadmin::doctor.create.get', 'wadmin::doctor.edit.get',
        'wadmin::khoa.index.get', 'wadmin::khoa.create.get', 'wadmin::khoa.edit.get'
    ];
    $indexRoute = ['wadmin::doctor.index.get'];
    $createRoute = ['wadmin::doctor.create.get', 'wadmin::doctor.edit.get'];
    $khoaRoute = ['wadmin::khoa.index.get', 'wadmin::khoa.create.get', 'wadmin::khoa.edit.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-user-plus"></i> <span>Bác sỹ</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::doctor.index.get')}}">Danh sách bác sỹ</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::doctor.create.get')}}">Thêm mới</a></li>
        <li class="{{in_array(Route::currentRouteName(), $khoaRoute) ? 'active' : '' }}"><a href="{{route('wadmin::khoa.index.get')}}">Quản lý khoa</a></li>
    </ul>
</li>
