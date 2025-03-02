<?php 

namespace App\Services;

use App\Repositories\TicketRepository;

class TicketService
{
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function createTicket(array $data)
    {
        return $this->ticketRepository->create($data);
    }

    public function getAllTickets()
    {
        return $this->ticketRepository->getAll();
    }

    public function getTicketById($id)
    {
        return $this->ticketRepository->getById($id);
    }

    public function updateTicket($id, array $data)
    {
        return $this->ticketRepository->update($id, $data);
    }

    public function deleteTicket($id)
    {
        return $this->ticketRepository->delete($id);
    }
}

