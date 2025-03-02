<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Services\TicketService;
use Illuminate\Http\Request;
use App\Models\Routes;
use Exception;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function store(Request $request)
    {
        try {
            // Ambil data request yang sudah divalidasi
            $data = TicketRequest::validate($request);

            // Ambil harga rute berdasarkan ID rute yang diberikan
            $route = Routes::findOrFail($data['route_id']);

            // Validasi apakah harga tiket sesuai dengan harga rute
            if ($data['price'] < $route->price) {
                return response()->json([
                    'message' => 'The price is below the routes price'
                ], 422);
            }

            // Buat tiket
            $ticket = $this->ticketService->createTicket($data);

            return response()->json([
                'message' => 'Ticket created successfully',
                'data' => new TicketResource($ticket)
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $tickets = $this->ticketService->getAllTickets();
        return TicketResource::collection($tickets);
    }

    public function show($id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        return new TicketResource($ticket);
    }

    public function update(Request $request, $id)
    {
        $data = TicketRequest::validate($request);
        $ticket = $this->ticketService->updateTicket($id, $data);

        return response()->json([
            'message' => 'Ticket updated successfully',
            'data' => new TicketResource($ticket)
        ]);
    }

    public function destroy($id)
    {
        $this->ticketService->deleteTicket($id);
        return response()->json(['message' => 'Ticket deleted successfully']);
    }
}

