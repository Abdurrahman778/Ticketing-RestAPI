<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $users = $this->userService->index();
            return response()->json(UserResource::collection($users), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userService->show($id);
            return response()->json(new UserResource($user), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

    }

    public function store(Request $request)
    {
        try {
            $payload = UserRequest::validate($request);
            $user = $this->userService->store($payload);
            return response()->json(new UserResource($user), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    

    // public function update(Request $request, $id)

    // {
    //     try {
    //         $payload = UserRequest::validate($request);
    //         $user = $this->userService->update($payload, $id);
    //         return response()->json(new UserResource($user), 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }

    // public function destroy($id)
    
    // {
    //     try {
    //         $stuff = $this->userService->destroy($id);
    //         return response()->json("delete success", 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }

    public function login(Request $request)
    {
        try {
            $payload = LoginRequest::validate($request);
            $login = $this->userService->login($payload);
            return response()->json($login, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function me(){
        try{
            $me = $this->userService->me();
            return response()->json($me, 200);
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function logout(Request $request){
        try {
            $this->userService->logout($request);
            return response()->json("logout success", 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}