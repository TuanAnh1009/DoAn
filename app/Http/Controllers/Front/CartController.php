<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index() {
        $carts = Cart::content();
        $subtotal = (int)str_replace(',', '', Cart::subtotal());
        $total = (int)str_replace(',', '', Cart::total());
        $shipping = 30000;

        return view('front/layout/cart', compact('carts', 'subtotal', 'total', 'shipping'));
    }

    public function add($id) {
        $product = $this->productService->find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => '1',
            'price' => $product->discount ?? $product->price,
            'weight' => $product->weight,
            'options' => ['images' => $product->productImages,],
        ]);

        return redirect('/cart');
    }

    public function update(Request $request, $rowId)
    {
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return back();
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
}
