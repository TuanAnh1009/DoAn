<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderService;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private $orderDetailService;
    private $orderService;

    public function __construct(OrderDetailServiceInterface $orderDetailService, OrderService $orderService)
    {
        $this->orderDetailService = $orderDetailService;
        $this->orderService = $orderService;
    }

    public function index() {
        $carts = Cart::content();
        $subtotal = (int)str_replace(',', '', Cart::subtotal());
        $total = (int)str_replace(',', '', Cart::total());
        $shipping = 30000;

        return view('front/checkout/index', compact('carts', 'total', 'subtotal', 'shipping'));
    }

    public function addOder(Request $request)
    {
        //Thêm đơn hàng
        $order = $this->orderService->create($request->all());

        //Thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount'=> $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        //xóa giỏ hàng
        Cart::destroy();

        //trả kết quả thông báo
        return redirect('checkout/result');
    }

    public function result()
    {
        return view('front/checkout/result');
    }
}
