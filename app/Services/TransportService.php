<?php

namespace App\Services;

use App\Repositories\TransportRepository;

class TransportService
{
    protected $transportRepository;

    public function __construct(TransportRepository $transportRepository)
    {
        $this->transportRepository = $transportRepository;
    }

    public function getAllTransports()
    {
        return $this->transportRepository->getAll();
    }

    public function getTransportById($id)
    {
        return $this->transportRepository->findById($id);
    }

    public function createTransport($data)
    {
        return $this->transportRepository->create($data);
    }

    public function updateTransport($id, $data)
    {
        return $this->transportRepository->update($id, $data);
    }

    public function deleteTransport($id)
    {
        return $this->transportRepository->delete($id);
    }
}
