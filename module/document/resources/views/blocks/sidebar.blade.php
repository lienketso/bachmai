@php
    $listRoute = [
        'wadmin::document.index.get', 'wadmin::document.create.get', 'wadmin::document.edit.get','wadmin::catdoc.index.get','wadmin::catdoc.create.get', 'wadmin::catdoc.edit.get'
    ];
    $indexRoute = ['wadmin::document.index.get','wadmin::document.create.get', 'wadmin::document.edit.get'];
    $catDocRoute = ['wadmin::catdoc.index.get','wadmin::catdoc.create.get', 'wadmin::catdoc.edit.get']
@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-file-word-o"></i> <span>File & tài liệu</span></a>
    <ul class="children">

        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::document.index.get')}}">Danh sách file tài liệu</a></li>
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::document.index.get')}}">Thêm mới</a></li>
        <li class="{{in_array(Route::currentRouteName(), $catDocRoute) ? 'active' : '' }}"><a href="{{route('wadmin::catdoc.index.get')}}">Danh mục</a></li>

    </ul>
</li>
