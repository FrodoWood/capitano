<option value="{{$category->id}}" {{ $currentCategory != null && $currentCategory->parent_id == $category->id ? 'selected' : '' }}
    {{$currentCategory != null && $category->id == $currentCategory->id ? 'disabled' : ''}}>
    {!! str_repeat("&nbsp;", $level * 4) !!} {{$category->name}}
</option>    

@if (!empty($category['children']))
    @foreach ($category['children'] as $child)
        @include('admin.adminProductCategoriesPartialsOption', ['category'=>$child, 'level'=> $level + 1])
    @endforeach
@endif