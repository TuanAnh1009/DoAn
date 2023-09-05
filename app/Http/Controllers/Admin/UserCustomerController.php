<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserCustomerController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'))->where('level' , 2);

        return view('admin/user/customer/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('password') != $request->get('password_confirmation')) {
            return back()
                ->with('notification','ERROR: confirm password does not match');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        $user = $this->userService->create($data);

        return redirect('admin/customer/'. $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->find($id);

        return view('admin/user/customer/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->find($id);

        return view('admin/user/customer/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()
                    ->with('notification', 'ERROR: confirm password does not match');
            }
            $data['password'] = bcrypt($request->get('password'));
        }else {
            unset($data['password']);
        }

        $this->userService->update($data, $id);

        return redirect('admin/customer/'. $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->delete($id);

        return redirect('admin/customer');
    }

    public function dashboardAdmin()
    {
        $orders = Order::all();
        $products = Product::all();
        $users = $this->userService->all()->where('level', '=', 2);
        return view('admin/dashboard', compact('users', 'products', 'orders'));
    }
}
