<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageValidateRequest;
use App\Services\ManageService;
use App\Models\Manage;

class ManageController extends Controller
{
    protected $manageService;

    public function __construct(ManageService $manageService)
    {
        $this->manageService = $manageService;
    }

    public function index()
    {
        return view('manage');
    }

    public function store(ManageValidateRequest $request)
    {
        $data = $request->validated();
        $this->manageService->create($data);
        return back()->withSuccess('Product created !');
    }

    public function showManageTable()
    {
        $manage = $this->manageService->getAllWithPagination(6);
        return view('managetable', ['manage' => $manage]);
    }


    public function edit($id)
    {
        $manage = $this->manageService->edit($id);
        return view('manageedit', ['manage' => $manage]);
    }

    public function update(ManageValidateRequest $request, $id)
    {
        $data = $request->validated();
        $this->manageService->update($id, $data);
        // return back()->withSuccess('Product updated !');
        return redirect()->route('tableManage')->withSuccess('Product Updated !');
    }

    public function delete($id)
    {
        $this->manageService->delete($id);
        return redirect()->route('tableManage');
    }

    public function showManageTrash()
    {
        $manage = Manage::onlyTrashed()->get();
        return view('manage_trashtable', ['manage' => $manage]);
    }

    public function restore($id)
    {
        $this->manageService->restore($id);
        return redirect()->route('manageTrash');
    }

    public function deletingForcefully($id)
    {
        $this->manageService->deleteForcefully($id);
        return redirect()->route('manageTrash');
    }

}


