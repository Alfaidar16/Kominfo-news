<li class="list-group-item" data-id="{{ $menuItem->id }}">
    {{ $menuItem->title }}
    <ul class="list-group mt-2 connectedSortable">
        @foreach ($menuItem->children as $child)
            @include('admin.menuList.menu_item', ['menuItem' => $child])
        @endforeach
    </ul>
</li>