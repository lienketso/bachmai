<ul class="dropdown-menu animated fadeOutUp">
    @foreach($childs as $child)
        <li><a href="{{ $child->link }}">{{ $child->name }}</a>
            @if(count($child->childs))
                @include('frontend::blocks.submenu',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
