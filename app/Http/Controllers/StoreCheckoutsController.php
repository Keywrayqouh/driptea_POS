<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\StoreOrder;
use App\Models\StoreAddOn;
use App\Models\StoreCheckouts;
use App\Events\pusherEvent;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StoreCheckoutsController extends Controller
{
    public function addCheckout(Request $request){
        $data = $request->all();
        $storeCheckouts = new StoreCheckouts();
        $storeCheckouts->customerId = $data['customerId'];
        $storeCheckouts->subTotal = $data['subTotal'];
        $storeCheckouts->deliveryFee = $data['deliveryFee'];
        $storeCheckouts->total = $data['total'];
        $storeCheckouts->incash = $data['incash'];
        $storeCheckouts->change = $data['change'];
        $storeCheckouts->save();
        $dataOrder = $data['order'];
        foreach($dataOrder as $value) {
            $storeOrder = new StoreOrder();
            $dataAddOns = $value['same_order'];
            $storeOrder->storeCheckoutsId = $storeCheckouts['id'];
            $storeOrder->customerId = $value['customerId'];
            $storeOrder->cashierId = $data['cashierId'];
            $storeOrder->productId = $value['productId'];
            $storeOrder->onlineId = $value['onlineId'];
            $storeOrder->customerType = $value['customerType'];
            $storeOrder->quantity = $value['quantity'];
            $storeOrder->size = $value['size'];
            $storeOrder->sugarLevel = $value['sugarLevel'];
            $storeOrder->cupType = $value['cupType'];
            $storeOrder->choosenPrice = $value['choosenPrice'];
            $storeOrder->subTotal = $value['subTotal'];
            $storeOrder->status = $value['status'];
            $storeOrder->save();
            foreach ($dataAddOns as $val) {
                $storeAddOns = new StoreAddOn();
                $storeAddOns->storeOrderId = $storeOrder['id'];
                $storeAddOns->addOns = $val['addOns'];
                $storeAddOns->save();
            }
        }
        event(new pusherEvent($storeCheckouts));
        return response()->json(compact('storeCheckouts'));
    }
    
    public function retrieveCheckouts(Request $request){
        $storeOrder = StoreOrder::with('orderProduct')->with('sameOrder')->with('getCashier')->with('getCheckouts')->where('storeCheckoutsId', $request->id)->where('deleted_at', null)->get();
        return response()->json(compact('storeOrder'));
    }

    public function retrieveOnlineCheckouts(Request $request){
        $storeOrder = StoreOrder::with('orderProduct')->with('sameOrder')->with('getCashier')->with('getCheckouts')->where('onlineId', $request->id)->where('deleted_at', null)->get()->groupBy('storeCheckoutsId');
        return response()->json(compact('storeOrder'));
    }
    
    public function retrieveYears(Request $request)
    {
        $years = StoreCheckouts::select(array(DB::raw('YEAR(created_at) as year')))
                    ->groupBy('year')
                    ->get();

        return response()->JSON(compact('years'));
    }
    public function retrieveAllCheckouts(Request $request){
        $storeOrder = StoreOrder::with('getCustomer')->with('orderProduct')->with('sameOrder')->with('getCashier')->with('getCheckouts')->where('deleted_at', null)->get()->groupBy('storeCheckoutsId');
        return response()->json(compact('storeOrder'));
    }

    public function retrieveAllSales(Request $request){
        $storeOrder = StoreOrder::with('orderProduct')->with('sameOrder')->with('getCheckouts')->where('deleted_at', null)->get()->groupBy(function($item)
        {
          return $item->created_at->format('d-M-y');
        });
        return response()->json(compact('storeOrder'));
    }

    public function retrieveDailySales(Request $request)
    {
        $total = StoreCheckouts::select(DB::raw('SUM(subTotal) as sub'),DB::raw('DAY(created_at) as `date`'),DB::raw('YEAR(created_at) as `year`'))
                ->whereMonth('created_at', '=', $request->month)
                ->whereYear('created_at', '=', $request->year)
                ->groupBy('created_at')
                 ->get();
        return response()->JSON(compact('total'));
    }
    
    public function retrieveMonthlySales(Request $request)
    {
        $subtotal = StoreCheckouts::select(array(DB::raw('SUM(subTotal) as sub'),DB::raw('MONTH(created_at) as month')))
                    ->whereYear('created_at', '=', $request->year)
                    ->groupBy('month')
                    ->get();

        return response()->JSON(compact('subtotal'));
    }

    public function retrieveQuarterSales(Request $request)
    {
        $subtotal = StoreCheckouts::select(array(DB::raw('SUM(subTotal) as sub'),DB::raw('MONTH(created_at) as month')))
                    ->whereYear('created_at', '=', $request->year)
                    ->groupBy('month')
                    ->get();

        return response()->JSON(compact('subtotal'));
    }

    public function retrieveSemiSales(Request $request)
    {
        $subtotal = StoreCheckouts::select(array(DB::raw('SUM(subTotal) as sub'),DB::raw('MONTH(created_at) as month')))
        ->whereYear('created_at', '=', $request->year)
        ->groupBy('month')
        ->get();

        return response()->JSON(compact('subtotal'));
    }

    public function retrieveAnnualSales(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $subtotal = StoreCheckouts::select(array(DB::raw('SUM(subTotal) as sub'),DB::raw('YEAR(created_at) as year')))
            // ->whereBetween('created_at', [$from, $to])
            ->groupBy('year')
            // ->orderBy('year', 'asc')
            ->get();
        // dd($subtotal);
        return response()->JSON(compact('subtotal'));
    }
}
