<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['items.service', 'payment']);

        if ($request->user()->role === 'customer') {
            $query->where('user_id', $request->user()->id);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->paginate(15);

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'data' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        return response()->json([
            'message' => 'Order retrieved successfully',
            'data' => $order->load(['items.service', 'payment']),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.service_id' => 'required|exists:services,id',
            'items.*.quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'pickup_date' => 'nullable|date',
            'delivery_address' => 'nullable|string|max:255',
        ]);

        $totalPrice = 0;
        $orderItems = [];

        foreach ($validated['items'] as $item) {
            $service = Service::find($item['service_id']);
            if (! $service) {
                return response()->json(['message' => 'Service not found'], 404);
            }

            $itemPrice = $service->price * $item['quantity'];
            $totalPrice += $itemPrice;

            $orderItems[] = [
                'service_id' => $item['service_id'],
                'quantity' => $item['quantity'],
                'price' => $service->price,
            ];
        }

        $order = Order::create([
            'user_id' => $request->user()->id,
            'order_number' => 'ORD-'.Str::upper(Str::random(8)),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
            'pickup_date' => $validated['pickup_date'] ?? null,
            'delivery_address' => $validated['delivery_address'] ?? null,
        ]);

        foreach ($orderItems as $item) {
            $order->items()->create($item);
        }

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order->load(['items.service']),
        ], 201);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
        ]);

        $order->update($validated);

        return response()->json([
            'message' => 'Order status updated successfully',
            'data' => $order,
        ]);
    }

    public function cancel(Order $order)
    {
        if (in_array($order->status, ['completed', 'cancelled'])) {
            return response()->json([
                'message' => 'Order cannot be cancelled',
            ], 422);
        }

        $order->update(['status' => 'cancelled']);

        return response()->json([
            'message' => 'Order cancelled successfully',
            'data' => $order,
        ]);
    }
}
