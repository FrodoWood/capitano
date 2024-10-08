@extends('layouts.adminLayout')

@section('title', 'Categories')

@section('content')
    <h1>Product Categories</h1>

    <div class="container">
        <div class="row mb-5 p-3 border rounded">
            <form action="{{route('createProductCategory')}}" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-1 form-group">
                                <label for="create-category-name">ID</label>
                                <input type="text" name="id" id="create-category-name" class="form-control" disabled value="#">
                            </div>
                            <div class="col-md-5 form-group">
                                <label for="create-category-name">Category name</label>
                                <input type="text" name="name" id="create-category-name" class="form-control fw-bold">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="create-category-parent">Parent category</label>
                                <select name="parent_id" id="create-category-parent" class="form-control">
                                    <option value="">Select category</option>
                                    @foreach ($categoriesTree as $categoryTree)
                                        @include('admin.adminProductCategoriesPartialsOption', ['category' => $categoryTree, 'currentCategory'=> null ,'level' => 0])
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 align-content-end">
                        <button type="submit" class="btn btn-success w-100">Create</button>
                    </div>

                    
                    
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        @foreach ($categories as $category)
            <div class="row mb-2 p-3 border rounded">
                <div class="col-lg-9">
                    <form action="{{ route('updateProductCategory', $category->id) }}" method="POST" id="create-form-{{$category->id}}">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-md-around">
                            <!-- Category ID (not editable, just displayed) -->
                            <div class="form-group col-md-1">
                                <label for="category-id-{{ $category->id }}">ID:</label>
                                <input type="text" id="category-id-{{ $category->id }}" value="{{ $category->id }}" class="form-control" disabled>
                            </div>
                            <!-- Input for Category Name -->
                            <div class="form-group col-md-5">
                                <label for="category-name-{{ $category->id }}">Category:</label>
                                <input type="text" name="name" id="category-name-{{ $category->id }}" value="{{ $category->name }}" class="form-control fw-bolder" required>
                            </div>
                            <!-- Dropdown for Parent Category -->
                            <div class="form-group col-md-6">
                                <label for="category-parent-{{ $category->id }}">Parent Category:</label>
                                <select name="parent_id" id="category-parent-{{$category->id}}" class="form-control fw-normal">
                                    <option value="">No Parent</option>
                                    @foreach ($categoriesTree as $categoryTree)
                                        @include('admin.adminProductCategoriesPartialsOption', ['category' => $categoryTree, 'currentCategory'=> $category ,'level' => 0])
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3 align-content-end">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" form="create-form-{{$category->id}}" class="btn btn-primary w-100">Update</button>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('deleteProductCategory', $category->id)}}" method="post" id="delete-form-{{$category->id}}">
                                @csrf
                                @method('delete')
                                <button type="submit" form="delete-form-{{$category->id}}" class="btn btn-danger w-100">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="container">
        @foreach ($categoriesTree as $categoryTree2)
            @include('admin.adminProductCategoriesPartials', ['category' => $categoryTree2, 'currentCategory'=> $category ,'level' => 0])
        @endforeach
    </div>
@endsection