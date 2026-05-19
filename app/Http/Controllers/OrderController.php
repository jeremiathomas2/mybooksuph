<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Agent;
use App\Models\Buyer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('customer');

        if ($request->has('search')) {
            $query->where('order_number', 'like', '%' . $request->search . '%')
                  ->orWhereHas('customer', function($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        $orders = $query->latest()->get();
        return view('pages.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return response()->json($order->load('customer'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_type' => 'required|in:Agent,Buyer',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'delivery_region' => 'required|string',
            'address_notes' => 'nullable|string',
        ]);

        // Create or find customer (simplified logic for demo)
        if ($validated['customer_type'] == 'Agent') {
            $customer = Agent::firstOrCreate(['name' => $validated['customer_name']], [
                'phone' => '0000000000',
                'church' => 'Unknown Church',
                'region' => $validated['delivery_region']
            ]);
        } else {
            $customer = Buyer::firstOrCreate(['name' => $validated['customer_name']], [
                'phone' => '0000000000',
                'region' => $validated['delivery_region']
            ]);
        }

        Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_type' => $validated['customer_type'],
            'customer_id' => $customer->id,
            'total_amount' => $validated['total_amount'],
            'payment_method' => $validated['payment_method'],
            'status' => 'Pending',
            'delivery_region' => $validated['delivery_region'],
            'address_notes' => $validated['address_notes'],
        ]);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
