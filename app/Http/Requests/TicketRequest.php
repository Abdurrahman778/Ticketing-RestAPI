<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as ValidationFactory;

class TicketRequest
{
    public static function validate(Request $request)
    {
        $request['status'] = $request->status ?? "pending";
        
        $rules = [
            'route_id' => 'required',
            'user_id' => 'required',
            'price' => 'required|integer',
            'status' => 'in:pending,paid,cancelled',
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

