<?php

namespace App\Repositories;

use App\Models\Routes;

class RouteRepository
{
    public function getAllRoutes()
    {
        return Routes::with('transport')->get();
    }

    public function getRouteById($id)
    {
        return Routes::with('transport')->findOrFail($id);
    }

    public function createRoute($data)
    {
        return Routes::create($data);
    }

    public function updateRoute($id, $data)
    {
        $route = Routes::findOrFail($id);
        $route->update($data);
        return $route;
    }

    public function deleteRoute($id)
    {
        return Routes::destroy($id);
    }
}
