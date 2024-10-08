<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if ($orders == null) {
            $orders = [];
        }
        $products = Product::all();
        if ($products == null) {
            $products = [];
        }

        $customers = User::where('role', '=', '0')->get();
        // var_dump($customers);
        return view('admin.admin')->with('orders', $orders)->with('products', $products)->with('customers', $customers);
    }

    public function getProducts()
    {
        $products = Product::all();
        return view('admin.adminProducts')->with('products', $products);
    }

    public function productCategories()
    {
        $categoriesTree = $this->getProductCategories();
        $categories = Category::all();
        // $categories = DB::table('categories as c1')->leftJoin('categories as c2', 'c1.parent_id', 'c2.id')
        //     ->select('c1.id', 'c1.name', 'c2.name as parent_name')->get();
        return view('admin.adminProductCategories')->with('categoriesTree', $categoriesTree)->with('categories', $categories);
    }

    public function createProductCategory(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $data['name'],
            'parent_id' => $data['parent_id']
        ]);

        return redirect()->route('adminProductCategories')->with('success', 'Category created successfully!');
    }

    public function updateProductCategory(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->route('adminProductCategories')->with('success', 'Category updated!');
    }

    public function deleteProductCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('adminProductCategories')->with('success', 'Category deleted!');
    }

    public function getProductCategories()
    {
        $categories = Category::all();
        $categoryTree = $this->buildCategoryTree($categories);
        // dd($categoryTree);

        return $categoryTree;
    }

    private function buildCategoryTree($categories, $parentId = null)
    {
        $branch = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $children = $this->buildCategoryTree($categories, $category->id);
                if ($children) {
                    $category['children'] = $children;
                }
                $branch[] = $category;
            }
        }
        return $branch;
    }
}
