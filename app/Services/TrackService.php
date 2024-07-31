<?php
namespace App\Services;

use App\Models\Track;
use App\Repositories\TrackRepository;
use Illuminate\Support\Facades\DB;

class TrackService
{

    protected $trackRepository;

    public function __construct(TrackRepository $trackRepository)
    {
        $this->trackRepository = $trackRepository;
    }

    public function getById($id)
    {
        return $this->trackRepository->getId($id);
    }

    public function getCategoryList1()
    {
        return $this->trackRepository->getCateogoryList1();
    }

    public function getCategoryList2()
    {
        return $this->trackRepository->getCateogoryList2();
    }

    public function create($data)
    {
        return $this->trackRepository->saveOrUpdate($data);
    }

    public function update($id, $data)
    {
        return $this->trackRepository->saveOrUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->trackRepository->delete($id);
    }

    public function restore($id)
    {
        return $this->trackRepository->restore($id);
    }

    public function deleteForcefully($id)
    {
        return $this->trackRepository->deleteForcefully($id);
    }

    public function getProductAndProductId()
    {
        return $this->trackRepository->getProductNameAndId();
    }
}

