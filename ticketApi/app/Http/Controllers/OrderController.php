<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get();

        return response()->json([
            'orders' => $orders->map(function($order) {
                return [
                    'id' => $order->id,
                    'penumpang_name' => $order->penumpang_name,
                    'pemesan_name' => $order->pemesan_name,
                    'phone_number' => $order->phone_number,
                    'total_passengers' => $order->total_passengers,
                    'total_price' => $order->total_passengers * $order->schedule->price,
                    'payment_code' => $order->payment_code,
                    'schedule' => $order->schedule,
                    'status' => $order->status,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                ];
            })
        ]);
    }

    public function pay(string $id)
    {
        $order = Order::find($id);

        if(!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        } 

        $order_code = uuid_create();

        $order->update([
            'status' => 'paid',
            'payment_code' => $order_code
        ]);

        return response()->json([
            'message' => "Order number $id has been paid",
            'payment_code' => $order_code
        ], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required',
            'total_passengers' => 'required',
        ]); 

        if($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422);
        }

        $order = Order::create([
            'id' => $request->id,
            'penumpang_name' => $request->penumpang_name,
            'pemesan_name' => $request->pemesan_name,
            'phone_number' => $request->phone_number,
            'total_passengers' => $request->total_passengers,
            'total_price' => $request->total_price,
            'payment_code' => $request->payment_code,
            'schedule_id' => $request->schedule_id,
            'status' => 'booked',
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);

        return response()->json([
            'message' => 'Order created',
            'order' => $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if(!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        } 

        return response()->json([
            'order' => [
                    'id' => $order->id,
                    'penumpang_name' => $order->penumpang_name,
                    'pemesan_name' => $order->pemesan_name,
                    'phone_number' => $order->phone_number,
                    'total_passengers' => $order->total_passengers,
                    'total_price' => $order->total_passengers * $order->schedule->price,
                    'payment_code' => $order->payment_code,
                    'schedule' => $order->schedule,
                    'status' => $order->status,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                ]
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if(!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        } 

        $validator = Validator::make($request->all(), [
            'penumpang_name' => 'required',
            'pemesan_name' => 'required',
            'phone_number' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422);
        }

        $order->update($request->all());

        return response()->json([
            'message' => "Order number $id has been updated",
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
