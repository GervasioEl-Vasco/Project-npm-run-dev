<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('is_available')) {
            $query->where('is_available', $request->boolean('is_available'));
        }

        $services = $query->paginate(15);

        return response()->json([
            'message' => 'Services retrieved successfully',
            'data' => $services,
        ]);
    }

    public function show(Service $service)
    {
        return response()->json([
            'message' => 'Service retrieved successfully',
            'data' => $service,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'duration_days' => 'required|integer|min:1',
            'is_available' => 'boolean',
            'image_url' => 'nullable|string|url',
        ]);

        $service = Service::create($validated);

        return response()->json([
            'message' => 'Service created successfully',
            'data' => $service,
        ], 201);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'duration_days' => 'nullable|integer|min:1',
            'is_available' => 'nullable|boolean',
            'image_url' => 'nullable|string|url',
        ]);

        $service->update($validated);

        return response()->json([
            'message' => 'Service updated successfully',
            'data' => $service,
        ]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json([
            'message' => 'Service deleted successfully',
        ]);
    }
}
