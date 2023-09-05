<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Collections\CollectionsServiceInterface;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $collectionsService;

    public function __construct(ProductServiceInterface $productService,
                                CollectionsServiceInterface $collectionsService)
    {
        $this->productService = $productService;
        $this->collectionsService = $collectionsService;
    }

    public function index() {
        $collections = $this->collectionsService->getCollections();

        $newProducts = $this->productService->getNewProducts();

        $featuredProducts = $this->productService->getFeaturedProducts();

        $brandProducts = $this->productService->getBrandProducts();

        return view('front/layout/home', compact('newProducts', 'featuredProducts', 'brandProducts', 'collections'));
    }
}
