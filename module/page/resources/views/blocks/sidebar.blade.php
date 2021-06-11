@php
    $listRoute = [
        'wadmin::page.index.get', 'wadmin::page.create.get', 'wadmin::page.edit.get'
    ];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}"><a href="{{route('wadmin::page.index.get',['post_type'=>'page'])}}"><i class="fa fa-file-text"></i> <span>Trang tĩnh</span></a></li>
