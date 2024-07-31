<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillValidateRequest;
use App\Services\BillService;

class BillController extends Controller
{

    protected $billService;

    public function __construct(billService $billService)
    {
        $this->billService = $billService;
    }

    public function storeBill(BillValidateRequest $request)
    {
        $data = $request->validated();
        $message = $this->billService->create($data);  
        return back()->withSuccess($message);   
    }

    public function updateBill(BillValidateRequest $request, $id)
    {
        $data = $request->validated();
        $message = $this->billService->update($data, $id);    
        return back()->withSuccess($message);  
    }

    public function editBill($id)
    {
        $column = $this->billService->editBill($id);
        $bills = $this->billService->getById($id);
        return view('billEditMaterial', ['bills' => $bills, 'column' => $column]);
    }

    public function deleteBill($id)
    {
        $this->billService->deleteBill($id);
        return redirect()->back();
    }

}
