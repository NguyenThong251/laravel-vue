<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Providers\BrandServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    protected $brandService;
    public function __construct(){
     $this->brandService = app('BrandService');
    // $this->brandService = $brandService;
    }
    public function index(){
        $brands = $this->brandService->getAllBrands();
        return Inertia::render("Admin/Brand/Index",[
            'brands' => $brands
        ]);
    }
    public function store(Request $request){
        $brand = new Brand;
        $brand -> name = $request->name;
        $brand -> slug = $request->slug;
        $brand -> save();
        return redirect()->route('admin.brands.index')->with('success','Brand created successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
    public function update(Request $request,$id){
        $brand = Brand::findOrFail($id);
        $brand -> name = $request->name;
        $brand -> slug = $request->slug;
        $brand -> update();
        return redirect()->route('admin.brands.index')->with('success','Brand updated successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
    public function destory($id){
        $brand = Brand::findOrFail($id)->delete();
        return redirect()->route('admin.brands.index')->with('success','Brand deleted successfully');
        // return Inertia::render("Admin/Brand/Create");
    }
}