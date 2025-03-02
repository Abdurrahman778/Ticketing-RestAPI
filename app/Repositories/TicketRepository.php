<?php 
namespace App\Repositories;

use App\Models\Ticket;

class TicketRepository
{
    public function create(array $data)
    {
        return Ticket::create($data);
    }

    public function getById($id)
    {
        return Ticket::findOrFail($id);
    }

    public function getAll()
    {
        return Ticket::all();
    }

    public function update($id, array $data)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($data);
        return $ticket;
    }

    public function delete($id)
    {
        return Ticket::destroy($id);
    }
}

