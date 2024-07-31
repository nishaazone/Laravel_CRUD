<?php

namespace App\Repositories;

use App\Models\Manage;
use App\Models\Track;

class ManageRepository
{

    public function saveOrUpdate($data, $id = null)
    {
        if ($id) {
            $manage = Manage::where('id', $id)->first();
        } else {
            $manage = new Manage();
        }

        $manage->product_name = $data['product_name'];
        $manage->cateogory = $data['cateogory'];
        $manage->save();

        if ($id) {
            $tracks = Track::where('product_id', $id)->get();
            foreach ($tracks as $track) {
                $track->product_name = $data['product_name'];
                $track->save();
            }
        }

        return $manage->fresh();
    }


    public function getAllWithPagination($perPage)
    {
        return Manage::paginate(7);
    }

    public function edit($id)
    {
        return Manage::where('id', $id)->first();
    }


    public function delete($id)
    {
        $manage = Manage::where('id', $id)->first();
        if (!is_null($manage)) {
            $manage->delete();
        }
        return $manage;
    }

    public function restore($id)
    {
        $manage = Manage::withTrashed()->where('id', $id)->first();
        if (!is_null($manage)) {
            $manage->restore();
        }
        return $manage;
    }

    public function deleteForcefully($id)
    {
        $manage = Manage::onlyTrashed()->where('id', $id)->first();
        if (!is_null($manage)) {
            $manage->forceDelete();
        }
        return $manage;
    }
}


