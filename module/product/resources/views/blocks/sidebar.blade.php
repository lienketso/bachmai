@php
    $listRoute = [
        'wadmin::product.index.get', 'wadmin::product.create.get', 'wadmin::product.edit.get','wadmin::cat.create.get','wadmin::cat.index.get','wadmin::cat.edit.get'
    ];
    $indexRoute = ['wadmin::product.index.get'];
    $createRoute = ['wadmin::product.create.get'];
    $catRoute = ['wadmin::cat.create.get','wadmin::cat.index.get','wadmin::cat.edit.get']
@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-cubes"></i> <span>Sản phẩm</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::product.index.get')}}">Danh sách sản phẩm</a></li>
        <li class="{{in_array(Route::currentRouteName(), $createRoute) ? 'active' : '' }}"><a href="{{route('wadmin::product.create.get')}}">Thêm mới</a></li>
        <li class="{{in_array(Route::currentRouteName(), $catRoute) ? 'active' : '' }}"><a href="{{route('wadmin::cat.index.get')}}">Danh mục</a></li>
    </ul>
</li>
