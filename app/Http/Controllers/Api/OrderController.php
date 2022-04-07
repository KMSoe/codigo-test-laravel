<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'grant_total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 400);
        }
        
        try {
            
            $order = new Order();
            $order->package_id = $request->package_id;
            $order->discount = $request->discount ?? 0.0;
            $order->user_id = auth()->user()->id;
            $order->grant_total = $request->grant_total;
            $order->save();

            return response()->json([
                "success" => true,
                "meta" => [
                    "id" => $order->id,
                ],
                "data" =>  $order,
            ], 201);
        } catch (QueryException $th) {
            return response()->json([
                "success" => false,
                "message" => "Something Went Wrong",
            ], 500);
        } catch (ModelNotFoundException $th) {
            return response()->json([
                "success" => false,
                "message" => "Something Went Wrong",
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Order::with('package')->findOrFail($id);


            return response()->json([
                "success" => true,
                "meta" => [
                    "id" => $order->id,
                ],
                "data" =>  $order,
            ], 200);
        } catch (ModelNotFoundException $th) {
            return response()->json([
                "success" => false,
                "message" => "Something Went Wrong",
            ], 404);
        }
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
        try {
            $order = Order::findOrFail($id);

            $order->grant_total = $request->grant_total;
            $order->save();

            return response()->json([
                "success" => true,
                "meta" => [
                    "id" => $order->id,
                ],
                "data" =>  $order,
            ], 200);
        } catch (ModelNotFoundException $th) {
            return response()->json([
                "success" => false,
                "message" => "Something Went Wrong",
            ], 404);
        } catch (QueryException $th) {
            return response()->json([
                "success" => false,
                "message" => "Something Went Wrong",
            ], 500);
        }
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
