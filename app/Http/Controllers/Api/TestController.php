<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Manage;


class TestController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     */
    public function storeManage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product' => ['required'],
            'cateogory' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        } else {
            $data=[
                'product' => $request->product,
                'cateogory' => $request->cateogory,
            ];

            DB::beginTransaction();
            try{
                $manage = Manage::create($data);
                DB::commit();
            } catch(\Exception $e){
                DB::rollback();
                $manage = null;
            }
            if($manage != null){
                return response()->json(['message'=> 'Manage Product Created'], 200);
            }else{
                return response()->json(['message'=>'Internal server error'], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function showManage(string $id)
    {
       $manage = Manage::find($id);
       if(is_null($manage)){
        $response = [
            'message' => 'User not found',
            'status' => 0,
        ];
       } else {
        $response = [
            'message' => 'User found',
            'status' => 1,
            'data' => $manage,
         ];
       }
       return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateManage(Request $request, string $id)
    {
        $manage = Manage::find($id);
        if(is_null($manage)){
             return response()->json(
                [
                    'message' => 'Product does not exist',
                    'status' => 0,
                ], 404
             );
        } else {
            DB::beginTransaction();
            try{
                $manage->product = $request['product'];
                $manage->cateogory = $request['cateogory'];
                $manage->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $manage = null;
            }
            if(is_null($manage)){
                return response()->json(
                 [
                    'message' => 'Internal server error',
                    'status' => 0,
                ], 500
              );
            } else {
                return response()->json([
                    'message'=> 'Data updated successfully',
                    'status'=> 1,
                ], 200 );
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyManage(string $id)
    {
        $manage = Manage::find($id);
        if(is_null($manage)){
            $response = [
                'message' => 'User does not exist',
                'status' => 0,
            ];
            $resCode = 404;
        } else {
            DB::beginTransaction();
            try{
                $manage->delete();
                DB::commit();
                $response = [
                    'message' => 'User deleted successfully',
                    'status' => 1,
                ];
                $resCode = 200;
            } catch(\Exception $e){
                DB::rollBack();
                $response = [
                    'message' => 'Internal server error',
                    'status' => 0,
                ];
                $resCode = 500;
            }
        }
        return response()->json($response, $resCode);
    }


   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


   // Check this method again.
   public function storeTrack(Request $request)
   {
       $validator = Validator::make($request->all(),[
           'product' => ['required'],
           'cateogory' => ['required'],
           'quantityproduced' => ['required'],
           'quantitysold' => ['required'],
           'quantityunit' => ['required'],
           'reportingperiod' => ['required'],
           'startdate' => ['required'],
           'enddate' => ['required'],

       ]);

       if($validator->fails()){
           return response()->json($validator->messages(), 400);
       } else {
           $data=[
               'product' => $request->product,
               'cateogory' => $request->cateogory,
               'quantityproduced' => $request->quantityproduced,
               'quantitysold' => $request->quantitysold,
               'quantityunit' => $request->quantityunit,
               'reportingperiod' => $request->reportingperiod,
               'startdate' => $request->startdate,
               'enddate' => $request->enddate,
           ];

           DB::beginTransaction();
           try{
               $track = Track::create($data);
               DB::commit();
           } catch(\Exception $e){
               DB::rollback();
               $track = null;
           }
           if($track != null){
               return response()->json(['message'=> 'Track Product Created'], 200);
           }else{
               return response()->json(['message'=>'Internal server error'], 500);
           }
       }
   }


   public function showTrack(string $id)
   {
      $track = Track::find($id);
      if(is_null($track)){
       $response = [
           'message' => 'User not found',
           'status' => 0,
       ];
      } else {
       $response = [
           'message' => 'User found',
           'status' => 1,
           'data' => $track,
        ];
      }
      return response()->json($response, 200);
   }


   public function destroyTrack(string $id)
   {
       $track = Track::find($id);
       if(is_null($track)){
           $response = [
               'message' => 'User does not exist',
               'status' => 0,
           ];
           $resCode = 404;
       } else {
           DB::beginTransaction();
           try{
               $track->delete();
               DB::commit();
               $response = [
                   'message' => 'User deleted successfully',
                   'status' => 1,
               ];
               $resCode = 200;
           } catch(\Exception $e){
               DB::rollBack();
               $response = [
                   'message' => 'Internal server error',
                   'status' => 0,
               ];
               $resCode = 500;
           }
       }
       return response()->json($response, $resCode);
   }

   // Put yet to be created

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function showBills($id){

    $bill = Bill::Select()->where('track_id', $id)->get();
    // return response()->json(['bill' => $bill]);
    if(is_null($bill)){
        $response = [
            'message' => 'Data not found',
            'status' => 0,
        ];
       } else {
        $response = [
            'message' => 'Data found',
            'status' => 1,
            'data' => $bill,
         ];
       }
       return response()->json($response, 200);

  }
}
