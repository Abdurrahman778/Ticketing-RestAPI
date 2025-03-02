<?php

namespace App\Http\Controllers;

use App\Services\RouteService;
use App\Http\Requests\RouteRequest;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected $routeService;

    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->routeService->getAllRoutes()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data' => $this->routeService->getRouteById($id)
        ]);
    }

    public function store(Request $request)
    {
        $data = RouteRequest::validate($request);
        return response()->json([
            'message' => 'Route created successfully',
            'data' => $this->routeService->createRoute($data)
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = RouteRequest::validate($request);
        return response()->json([
            'message' => 'Route updated successfully',
            'data' => $this->routeService->updateRoute($id, $data)
        ]);
    }

    public function destroy($id)
    {
        $this->routeService->deleteRoute($id);
        return response()->json([
            'message' => 'Route deleted successfully'
        ]);
    }
}
