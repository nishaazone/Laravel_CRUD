<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackValidateRequest;
use App\Services\TrackService;
use App\Models\Track;
use App\Models\Bill;

class TrackController extends Controller
{
    protected $trackService;

    public function __construct(TrackService $trackService)
    {
        $this->trackService = $trackService;
    }

    // public function getColumnCateogory()
    // {
    //    $column = $this->trackService->getCategoryList1();
    //    return view('track',['column'=>$column]);          
    // }

    //check this
    public function getColumnCateogory()
    {
        $column = $this->trackService->getProductAndProductId();
        return view('track', ['column' => $column]);
    }

    public function store(TrackValidateRequest $request)
    {

        $data = $request->validated();
        $this->trackService->create($data);
        return back()->withSuccess('Track Product created !');
    }

    public function showTrackTable()
    {
        $tracks = Track::paginate(7);
        return view('tracktable', ['tracks' => $tracks]);
    }

    public function edit($id)
    {
        $track = $this->trackService->getById($id);
        $column = $this->trackService->getCategoryList1();
        return view('trackedit', ['track' => $track, 'column' => $column]);
    }

    public function delete($id)
    {
        $this->trackService->delete($id);
        return redirect()->route('tableTrack');
    }


    public function update(TrackValidateRequest $request, $id)
    {
        $data = $request->validated();
        $this->trackService->update($id, $data);
        // return back()->withSuccess('Track Product updated !');
        return redirect()->route('tableTrack')->withSuccess('Product Updated !');   
    }

    public function show($id)
    {
        $bills = Bill::where('track_id', $id)->paginate(10);
        $track = Track::where('id', $id)->first();
        return view('show', ['track' => $track, 'bills' => $bills]);
    }


    public function showBillForm($id)
    {
        $column = $this->trackService->getCategoryList2();
        $track = Track::find($id);
        return view('billMaterial', ['track' => $track, 'column' => $column]);
    }

    public function showTrackTrash()
    {
        $tracks = Track::onlyTrashed()->get();
        return view('track_trashtable', ['tracks' => $tracks]);
    }

    public function restore($id)
    {
        $this->trackService->restore($id);
        return redirect()->route('trackTrash');
    }

    public function deletingForcefully($id)
    {
        $this->trackService->deleteForcefully($id);
        return redirect()->route('trackTrash');
    }
}
