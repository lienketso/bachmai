@php
    $listRoute = [
        'wadmin::contact.index.get'
    ];

@endphp

<li class="{{in_array(Route::currentRouteName(), $listRoute) ? 'active' : '' }}">
    <a href="{{route('wadmin::contact.index.get')}}"><i class="fa fa-paper-plane-o"></i>
        <span>Liên hệ</span> @if($countContact>0)<strong class="alert_an">{{$countContact}}</strong>@endif</a></li>
