@foreach($items as $menu_item)
    <a href="{{ $menu_item->link() }}" target="_blank">
        <i class="fa fa-{{ $menu_item->title }}"></i>
    </a>
@endforeach
