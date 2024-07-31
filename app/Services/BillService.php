<?php
namespace App\Services;

use App\Models\Bill;
use App\Repositories\BillRepository;
use Illuminate\Support\Facades\DB;

class BillService
{

    protected $billRepository;

    public function __construct(BillRepository $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function getById($id)
    {
        return $this->billRepository->getById($id);
    }

    public function create($data)
    {
        return $this->billRepository->saveOrUpdate($data);
    }

    public function update($data, $id)
    {
        return $this->billRepository->saveOrUpdate($data, $id);
    }

    public function editBill($id)
    {
        return $this->billRepository->editBill($id);
    }

    public function deleteBill($id)
    {
        return $this->billRepository->deleteBill($id);
    }
}