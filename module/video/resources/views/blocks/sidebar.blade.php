@php
    $listRoute = [
        'wadmin::video.index.get', 'wadmin::video.create.get', 'wadmin::video.edit.get', 'wadmin::adver.index.get', 'wadmin::adver.create.get','wadmin::adver.edit.get'
    ];
    $indexRoute = ['wadmin::video.index.get','wadmin::video.create.get', 'wadmin::video.edit.get'];
    $logoRoute = ['wadmin::adver.index.get','wadmin::adver.create.get','wadmin::adver.edit.get']
@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-video-camera"></i> <span>Video clip & Adver</span></a>
    <ul class="children">

        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::video.index.get')}}">Danh sách video</a></li>
        <li class="{{in_array(Route::currentRouteName(), $logoRoute) ? 'active' : '' }}"><a href="{{route('wadmin::adver.index.get')}}">Logo chân trang</a></li>
        <li class=""><a href="#">Banner quảng cáo</a></li>
    </ul>
</li>
