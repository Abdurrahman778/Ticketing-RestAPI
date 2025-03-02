<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportRequest;
use App\Http\Resources\TransportResource;
use App\Services\TransportService;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    protected $transportService;

    public function __construct(TransportService $transportService)
    {
        $this->transportService = $transportService;
    }

    public function index()
    {
        try {
            $transports = $this->transportService->getAllTransports();
            return response()->json(TransportResource::collection($transports), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show($id)
    {
        $transport = $this->transportService->getTransportById($id);
        if (!$transport) {
            return response()->json(['message' => 'Transport not found'], 404);
        }

        return response()->json(['data' => TransportResource::toArray($transport)]);
    }

    public function store(Request $request)
    {
        $data = TransportRequest::validate($request);
        $transport = $this->transportService->createTransport($data);

        return response()->json([
            'message' => 'Transport created successfully',
            'data' => new TransportResource($transport)
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = TransportRequest::validate($request);
        $transport = $this->transportService->updateTransport($id, $data);

        if (!$transport) {
            return response()->json(['message' => 'Transport not found'], 404);
        }

        return response()->json([
            'message' => 'Transport updated successfully',
            'data' => new TransportResource($transport)
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->transportService->deleteTransport($id);

        if (!$deleted) {
            return response()->json(['message' => 'Transport not found'], 404);
        }

        return response()->json(['message' => 'Transport deleted successfully']);
    }
}
