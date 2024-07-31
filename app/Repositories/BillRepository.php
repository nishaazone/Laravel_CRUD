<?php

namespace App\Repositories;

use App\Models\Track;
use App\Models\Manage;
use App\Models\Bill;

class BillRepository
{
    public function getById($id)
    {
        return Bill::where('Component_id', $id)->first();
    }

    public function saveOrUpdate($data, $id = null)
    {
        if ($id) {
            $bill = Bill::where('Component_id', $id)->first();
        } else {
            $bill = new Bill();
        }

        $bill->component_name = $data['component_name'];
        $bill->part_number = $data['part_number'];
        $bill->description = $data['description'];
        $bill->quantity_per_unit = $data['quantity_per_unit'];
        $bill->quantity_purchased = $data['quantity_purchased'];
        $bill->quantity = $data['quantity'];
        $bill->quantity_unit = $data['quantity_unit'];
        $bill->source = $data['source'];
        $bill->supplier = $data['supplier'];
        $bill->track_id = $data['track_id'];
        $bill->save();

        $message = $id ? 'Bill updated!' : 'Bill created!';
        return $message;
    }

    public function editBill($id)
    {
        return Manage::select('product_name')->where('cateogory', 'Purchased Goods And Services')->get();
    }

    public function deleteBill($id)
    {
        $bills = Bill::where('Component_id', $id)->first();
        if (!is_null($bills)) {
            $bills->delete();
        }
        return $bills;
    }
}
