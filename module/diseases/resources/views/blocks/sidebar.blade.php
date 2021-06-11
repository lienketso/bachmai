@php
    $listRoute = [
        'wadmin::diseases.index.get', 'wadmin::diseases.create.get', 'wadmin::diseases.edit.get',
        'wadmin::health.index.get', 'wadmin::health.create.get', 'wadmin::health.edit.get'
    ];
    $indexRoute = ['wadmin::diseases.index.get','wadmin::diseases.create.get', 'wadmin::diseases.edit.get'];
    $healthRoute = ['wadmin::health.index.get'];
    $createRoute = ['wadmin:::health.create.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-heartbeat"></i> <span>Sức khỏe & Bệnh lý</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::diseases.index.get')}}">Danh mục chủ đề</a></li>
        <li class="{{in_array(Route::currentRouteName(), $healthRoute) ? 'active' : '' }}"><a href="{{route('wadmin::health.index.get')}}">Danh sách bài viết</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::health.create.get')}}">Thêm bài viết</a></li>
    </ul>
</li>
