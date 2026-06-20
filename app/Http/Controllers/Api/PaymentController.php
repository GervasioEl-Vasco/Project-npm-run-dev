<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,bank_transfer,e_wallet',
        ]);

        $order = Order::find($validated['order_id']);

        if ($order->payment) {
            return response()->json([
                'message' => 'Payment already exists for this order',
            ], 422);
        }

        $payment = Payment::create([
            'order_id' => $validated['order_id'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Payment created successfully',
            'data' => $payment,
        ], 201);
    }

    public function show(Payment $payment)
    {
        return response()->json([
            'message' => 'Payment retrieved successfully',
            'data' => $payment,
        ]);
    }

    public function confirm(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'transaction_id' => 'nullable|string',
        ]);

        $payment->update([
            'status' => 'completed',
            'paid_at' => now(),
            'transaction_id' => $validated['transaction_id'] ?? null,
        ]);

        $payment->order->update(['status' => 'processing']);

        return response()->json([
            'message' => 'Payment confirmed successfully',
            'data' => $payment,
        ]);
    }
}
