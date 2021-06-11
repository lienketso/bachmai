@php
    $listRoute = [
        'wadmin::contact.index.get'
    ];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::donate.index.get')}}"><i class="fa fa-money"></i>
        <span>Quỹ bệnh viện</span> </a></li>
