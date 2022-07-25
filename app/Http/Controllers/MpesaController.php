<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;



use SmoDav\Mpesa\C2B\STK;
use SmoDav\Mpesa\Engine\Core;
use SmoDav\Mpesa\Native\NativeCache;
use SmoDav\Mpesa\Native\NativeConfig;

use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $arr = array();
        $config = new NativeConfig();
        $cache = new NativeCache(storage_path('framework/cache/data'));
        $core = new Core(new Client, $config, $cache);

        $orders = Orders::create([
            'ordernumber' => $request->item,
            'quotations_id' => $request->item,
            'amount' => $request->total,
            'PhoneNumber' => $request->number
        ]);


        $stk = new STK($core);

        $response = $stk->request($request->total)
            ->from($request->number)
            ->usingReference($request->item, $request->item) 
            ->setCommand("CustomerBuyGoodsOnline")
            ->push();
        Log::info(json_encode($response));

        $orders->CheckoutRequestID =  $response->CheckoutRequestID;
        $orders->save();


        return response()->json(array('response' => "success",'body'=>  $response->CheckoutRequestID));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        $arr = array();
        $config = new NativeConfig();
        $cache = new NativeCache(storage_path('framework/cache/data'));
        $core = new Core(new Client, $config, $cache);

        $stk = new STK($core);
    
        $response = $stk->validate($id);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
