<?php

namespace App\Services;

use App\Repositories\RouteRepository;

class RouteService
{
    protected $routeRepository;

    public function __construct(RouteRepository $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getAllRoutes()
    {
        return $this->routeRepository->getAllRoutes();
    }

    public function getRouteById($id)
    {
        return $this->routeRepository->getRouteById($id);
    }

    public function createRoute($data)
    {
        return $this->routeRepository->createRoute($data);
    }

    public function updateRoute($id, $data)
    {
        return $this->routeRepository->updateRoute($id, $data);
    }

    public function deleteRoute($id)
    {
        return $this->routeRepository->deleteRoute($id);
    }
}
