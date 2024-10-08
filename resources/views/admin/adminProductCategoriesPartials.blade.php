<p style="padding-left: {{$level * 30}}px;">
    {{$category->name}}
</p>

@if (!empty($category['children']))
    @foreach ($category['children'] as $child)
        @include('admin.adminProductCategoriesPartials', ['category'=>$child, 'level'=> $level + 1])
    @endforeach
@endif
