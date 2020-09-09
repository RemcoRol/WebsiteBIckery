<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->menu_title }}
            @if(count($child->childs))
                @include('beheer.menus.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
