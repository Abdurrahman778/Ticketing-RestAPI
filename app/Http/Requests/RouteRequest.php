<?php

namespace App\Http\Requests;

use App\Models\Routes;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as ValidationFactory;

class RouteRequest
{
    public static function validate(Request $request)
    {
        $rules = [
            'transport_id' => 'required',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric|min:0',
        ];

        $validator = app(ValidationFactory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            // Return a JSON response immediately if validation fails
            response()->json(['errors' => $validator->errors()], 400)->send();
            exit; // Ensure the script stops execution
        }

        return $request->only(array_keys($rules)); // Return only the validated data
    }


}

