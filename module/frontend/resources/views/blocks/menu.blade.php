@php
    $menus = getAllmenu();
@endphp

@if(!empty($menus))
<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
    @foreach($menus as $menu)
        @if(count($menu->childs))
    <li class="dropdown"> <a href="{{$menu->link}}" @if(count($menu->childs))class="dropdown-toggle" @endif data-toggle="dropdown"><span>{{$menu->name}}</span></a>
            @include('frontend::blocks.submenu',['childs' => $menu->childs])
    </li>
            @else
            <li> <a href="{{$menu->link}}"><span>{{$menu->name}}</span></a></li>
        @endif
    @endforeach
</ul>
@endif
