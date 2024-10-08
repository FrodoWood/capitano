<p style="padding-left: {{$level * 20}}px;">
    {{$category->name}}
</p>

@if (!empty($category['children']))
    @foreach ($category['children'] as $child)
        @include('admin.adminProductCategoriesPartials', ['category'=>$child, 'level'=> $level + 1])
    @endforeach
@endif
