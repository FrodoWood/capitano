@extends('layouts.adminLayout')

@section('title', 'Categories')

@section('content')
    <h1>Product Categories</h1>

    <div class="container">
        <form action="{{route('createProductCategory')}}" method="POST" class="mb-5 p-3 border rounded">
            @csrf
            @method('post')
            <div class="row">
                <div class="col-md-1 form-group">
                    <label for="create-category-name">ID</label>
                    <input type="text" name="id" id="create-category-name" class="form-control" disabled value="#">
                </div>
                <div class="col-md-4 form-group">
                    <label for="create-category-name">Category name</label>
                    <input type="text" name="name" id="create-category-name" class="form-control fw-bold">
                </div>
                <div class="col-md-5 form-group">
                    <label for="create-category-parent">Parent category</label>
                    <select name="parent_id" id="create-category-parent" class="form-control">
                        <option value="">Select category</option>
                        @foreach ($categoriesTree as $categoryTree)
                            @include('admin.adminProductCategoriesPartialsOption', ['category' => $categoryTree, 'currentCategory'=> null ,'level' => 0])
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 align-content-end">
                    <button type="submit" class="btn btn-success w-100">Create</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="category-list">
            @foreach ($categories as $category)
                <form action="{{ route('updateProductCategory', $category->id) }}" method="POST" class="category-item mb-3 p-3 border rounded">
                    @csrf
                    @method('PUT')
        
                    <div class="row justify-content-md-around">
                        <!-- Category ID (not editable, just displayed) -->
                        <div class="form-group col-md-1">
                            <label for="category-id-{{ $category->id }}">ID:</label>
                            <input type="text" id="category-id-{{ $category->id }}" value="{{ $category->id }}" class="form-control" disabled>
                        </div>
                        <!-- Input for Category Name -->
                        <div class="form-group col-md-4">
                            <label for="category-name-{{ $category->id }}">Category:</label>
                            <input type="text" name="name" id="category-name-{{ $category->id }}" value="{{ $category->name }}" class="form-control fw-bolder" required>
                        </div>
                        <!-- Dropdown for Parent Category -->
                        <div class="form-group col-md-5">
                            <label for="category-parent-{{ $category->id }}">Parent Category:</label>
                            <select name="parent_id" id="category-parent-{{$category->id}}" class="form-control fw-normal">
                                <option value="">No Parent</option>
                                @foreach ($categoriesTree as $categoryTree)
                                    @include('admin.adminProductCategoriesPartialsOption', ['category' => $categoryTree, 'currentCategory'=> $category ,'level' => 0])
                                @endforeach
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <div class="col-md-1 mt-2 align-content-end">
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>

                        <div class="col-md-1 align-content-end">
                            <form action="{{route('deleteProductCategory', $category->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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