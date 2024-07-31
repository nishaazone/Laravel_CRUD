<?php
namespace App\Services;

use App\Models\Manage;
use App\Repositories\ManageRepository;
use Illuminate\Support\Facades\DB;

class ManageService
{

    protected $manageRepository;

    public function __construct(ManageRepository $manageRepository)
    {
        $this->manageRepository = $manageRepository;
    }

    public function create($data)
    {
        return $this->manageRepository->saveOrUpdate($data);
    }

    public function edit($id)
    {
        return $this->manageRepository->edit($id);
    }

    public function update($id, $data)
    {
        return $this->manageRepository->saveOrUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->manageRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->manageRepository->restore($id);
    }

    public function deleteForcefully($id)
    {
        return $this->manageRepository->deleteForcefully($id);
    }

    public function getAllWithPagination($perPage)
    {
        return $this->manageRepository->getAllWithPagination($perPage);
    }

}


