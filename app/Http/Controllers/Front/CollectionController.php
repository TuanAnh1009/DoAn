<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index() {
        $collections = ProductCategory::all();

        return view('front/layout/collections-list', compact('collections'));
    }

    public function show($id) {
        $collections = ProductCategory::findOrFail($id);
        return view('front/layout/collections', compact('collections'));
    }
}
