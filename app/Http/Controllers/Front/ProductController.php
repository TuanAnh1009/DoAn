<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService, BrandServiceInterface $brandService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
    }

    public function index(Request $request) {
        $products = $this->productService->getProductOnIndex($request);
        $brands = $this->brandService->all();

        return view('front/layout/products', compact('products','brands'));
    }

    public function show($id) {
        $product = $this->productService->find($id);

        $relateProducts = $this->productService->getRelateProducts($product);

        return view('front/layout/product', compact('product', 'relateProducts'));
    }
}
