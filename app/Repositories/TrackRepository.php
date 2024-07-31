<?php

namespace App\Repositories;

use App\Models\Track;
use App\Models\Manage;

class TrackRepository
{

    public function getId($id)
    {
        return Track::where('id', $id)->first();
    }

    public function getCateogoryList1()
    {
        return Manage::select('product_name')->where('cateogory', 'Manufactured Goods')->get();
    }

    public function getProductNameAndId()
    {
        return Manage::select('id', 'product_name')->where('cateogory', 'Manufactured Goods')->get();
    }

    public function getCateogoryList2()
    {
        return Manage::select('product_name')->where('cateogory', 'Purchased Goods And Services')->get();
    }

    public function saveOrUpdate($data, $id = null)
    {
        if ($id) {
            $track = Track::where('id', $id)->first();
        } else {
            $track = new Track();
        }

        $product = Manage::where('product_name', $data['product_name'])->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $track->product_id = $product->id;
        $track->product_name = $data['product_name'];
        $track->quantity_produced = $data['quantity_produced'];
        $track->quantity_sold = $data['quantity_sold'];
        $track->quantity_unit = $data['quantity_unit'];
        $track->reporting_period = $data['reporting_period'];
        $track->start_date = $data['start_date'];
        $track->end_date = $data['end_date'];
        $track->save();

        return $track->fresh();
    }


    public function delete($id)
    {
        $track = Track::where('id', $id)->first();
        if (!is_null($track)) {
            $track->delete();
        }
        return $track;
    }

    public function restore($id)
    {
        $track = Track::withTrashed()->where('id', $id)->first();
        if (!is_null($track)) {
            $track->restore();
        }
        return $track;
    }

    public function deleteForcefully($id)
    {
        $track = Track::onlyTrashed()->where('id', $id)->first();
        if (!is_null($track)) {
            $track->forceDelete();
        }
        return $track;
    }

}
