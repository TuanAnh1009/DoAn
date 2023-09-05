<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
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
        $users = $this->userService->searchAndPaginate('name', $request->get('search'))->where('level' , 1);

        return view('superadmin/admin/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin/admin/create');
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

        return redirect('sadmin/admin/'. $user->id);
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

        return view('superadmin/admin/show', compact('user'));
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

        return view('superadmin/admin/edit', compact('user'));
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
            unset($data['password_confirmation']);
        }

        $this->userService->update($data, $id);

        return redirect('sadmin/admin/'. $id);
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

        return redirect('sadmin/admin');
    }

    public function myAccount()
    {
        return view('admin/my-account');
    }

    public function editAccount(Request $request) {
        $data = $request->all();
        $id_user = $request->get('id');
        $data['password'] = Auth::user()->password;

        dd($data);

        $this->userService->update($data, $id_user);

        return redirect('admin/my-account')->with('alert', 'Saved!');
    }

    public function dashboardSAdmin()
    {
        $admins = $this->userService->all()->where('level', '=', 1);
        return view('superadmin/dashboard', compact('admins'));
    }
}
