<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(){
     $this->categoryService = app('CategoryService');
    }
    public function index(){
        $categories = $this->categoryService->getAllCategories();
        return Inertia::render("Admin/Category/Index",[
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $category = new Category;
        $category -> name = $request->name;
        $category -> slug = $request->slug;
        $category -> save();
        return redirect()->route('admin.categories.index')->with('success','Brand created successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
    public function update(Request $request,$id){
        $category = Category::findOrFail($id);
        $category -> name = $request->name;
        $category -> slug = $request->slug;
        $category -> update();
        return redirect()->route('admin.categories.index')->with('success','Brand updated successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
    public function destory($id){
        $category = Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories.index')->with('success','Brand deleted successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
}