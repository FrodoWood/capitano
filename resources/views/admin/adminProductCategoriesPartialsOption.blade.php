<option value="{{$category->id}}" {{ $currentCategory->parent_id == $category->id ? 'selected' : '' }}
    {{$category->id == $currentCategory->id ? 'disabled' : ''}}>
    {!! str_repeat("&nbsp;", $level) !!} {{$category->name}}
</option>    

@if (!empty($category['children']))
    @foreach ($category['children'] as $child)
        @include('admin.adminProductCategoriesPartialsOption', ['category'=>$child, 'level'=> $level + 1])
    @endforeach
@endif