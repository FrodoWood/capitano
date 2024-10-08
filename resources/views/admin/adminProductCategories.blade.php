@extends('layouts.adminLayout')

@section('title', 'Categories')

@section('content')
    <h1>Product Categories</h1>

    <div class="container">
        <div class="category-list">
            @foreach ($categories as $category)
                <form action="{{ route('updateProductCategory', $category->id) }}" method="POST" class="category-item mb-3 p-3 border rounded">
                    @csrf
                    @method('PUT')
        
                    <div class="row">
                        <!-- Category ID (not editable, just displayed) -->
                        <div class="form-group col-auto">
                            <label for="category-id-{{ $category->id }}">Category ID:</label>
                            <input type="text" id="category-id-{{ $category->id }}" value="{{ $category->id }}" class="form-control" disabled>
                        </div>
                        <!-- Input for Category Name -->
                        <div class="form-group col-auto">
                            <label for="category-name-{{ $category->id }}">Category Name:</label>
                            <input type="text" name="name" id="category-name-{{ $category->id }}" value="{{ $category->name }}" class="form-control" required>
                        </div>
                        <!-- Dropdown for Parent Category -->
                        <div class="form-group col-auto">
                            <label for="category-parent-{{ $category->id }}">Parent Category:</label>
                            {{-- <select name="parent_id" id="category-parent-{{ $category->id }}" class="form-control">
                                <option value="">No Parent</option>
                                @foreach($categories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}" {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                                        {{ $parentCategory->name }}
                                    </option>
                                @endforeach
                            </select> --}}

                            <select name="parent_id" id="category-parent-{{$category->id}}" class="form-control">
                                <option value="">No Parent</option>
                                @foreach ($categoriesTree as $categoryTree)
                                    @include('admin.adminProductCategoriesPartialsOption', ['category' => $categoryTree, 'currentCategory'=> $category ,'level' => 0])
                                @endforeach
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-auto mt-2 align-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

        <div class="container">
            @foreach ($categoriesTree as $categoryTree2)
                @include('admin.adminProductCategoriesPartials', ['category' => $categoryTree2, 'currentCategory'=> $category ,'level' => 0])
            @endforeach
        </div>
        
        
    </div>

@endsection