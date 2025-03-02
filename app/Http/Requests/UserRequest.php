<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as ValidationFactory;

class UserRequest
{
    public static function validate(Request $request)
    {

        $request['role'] = $request->role ?? "user";

        $rules = [
            'name' => 'required|min:3',
            'role' => 'required|in:' . implode(',', [User::ADMIN, User::USER]),
            'email' => 'required|email',
            'password' => 'required',

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
