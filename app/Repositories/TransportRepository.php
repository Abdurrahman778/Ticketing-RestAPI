<?php

namespace App\Repositories;

use App\Models\Transport;

class TransportRepository
{
    public function getAll()
    {
        return Transport::all();
    }

    public function findById($id)
    {
        return Transport::find($id);
    }

    public function create($data)
    {
        return Transport::create($data);
    }

    public function update($id, $data)
    {
        $transport = Transport::find($id);
        if ($transport) {
            $transport->update($data);
        }
        return $transport;
    }

    public function delete($id)
    {
        $transport = Transport::find($id);
        if ($transport) {
            return $transport->delete();
        }
        return false;
    }
}
