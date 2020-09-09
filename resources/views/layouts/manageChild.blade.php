@foreach($childs as $child)
    <a class="dropdown-item" href="{{ $child->page->getRedirectUrl() }}"> {{ $child->menu_title }}</a>
@endforeach
