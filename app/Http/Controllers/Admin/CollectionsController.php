<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Collections\CollectionsServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    private $collectionsService;

    public function __construct(CollectionsServiceInterface $collectionsService)
    {
        $this->collectionsService = $collectionsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collections = $this->collectionsService->searchAndPaginate('name', $request->get('search'));

        return view('admin/collections/index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/collections/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'), 'img/collections');
            unset($data['image']);
        }

        $this->collectionsService->create($data);

        return redirect('admin/collections');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collections = $this->collectionsService->find($id);

        return view('admin/collections/show', compact('collections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collections = $this->collectionsService->find($id);

        return view('admin/collections/edit', compact('collections'));
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

        //Xử lý ảnh
        if($request->hasFile('image')){
            // Thêm file mới
            $data['avatar'] = Common::uploadFile($request->file('image'), 'img/collections');

            //Xóa file cũ
            $file_name_old = $request->get('image_old');
            if($file_name_old != '') {
                unlink('img/collections/'. $file_name_old);
            }
        } else {
            $data['avatar'] = $request->get('image_old');
        }

        unset($data['image']);
        unset($data['image_old']);

        $this->collectionsService->update($data, $id);

        return redirect('admin/collections/' .$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collections = $this->collectionsService->find($id);
        $this->collectionsService->delete($id);

        //Xóa file
        $file_name = $collections->avatar;
        if($file_name != '') {
            unlink('img/collections/'. $file_name);
        }
        return redirect('admin/collections');
    }
}
