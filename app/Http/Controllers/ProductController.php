<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Models\ProductVariant;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    public function fetch(Request $request)
    {
        $query = ProductVariant::with('product');
        // Keyword 
        if($keyword = $request->query('keyword')){
            $query->whereHas('product', function($q) use ($keyword){
                $q->where('name', 'like', "%$keyword%")->orWhere('sku', 'like', "%$keyword%");
            });
        }
        $variants = $query->paginate(8);

        return view('product.ajax-product-list', compact('variants'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, ProductService $service)
    {
        $validatedData = $request->validated();
        // Add the created_by field
        $validatedData['created_by'] = 1;
        // Create Product
        $product = Product::create($validatedData);
        // Create Product Variant
        $service->store($product, $validatedData);
    
        return redirect()->route('products.index')->with('success', "Product created successfully!");
    }

 
    

    
}
