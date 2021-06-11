@php
    $listRoute = [
        'wadmin::comment.index.get', 'wadmin::comment.edit.get'
    ];
    $indexRoute = ['wadmin::comment.index.get','wadmin::comment.edit.get'];

@endphp

<li class="nav-parent {{in_array(Route::currentRouteName(), $listRoute) ? 'nav-active active' : '' }}">
    <a href="" ><i class="fa fa-comments"></i> <span>Comment</span></a>
    <ul class="children">
        <li class="{{in_array(Route::currentRouteName(), $indexRoute) ? 'active' : '' }}"><a href="{{route('wadmin::comment.index.get')}}">Danh sách comment</a></li>
    </ul>
</li>
