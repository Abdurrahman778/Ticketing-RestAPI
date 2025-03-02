<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//memsiahkan business logic dengan controller. proses manipulasi hasi dari repository


class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function index()
    {
        return $this->userRepository->getAlluser();
    }

    public function show($id)
    {
        return $this->userRepository->getSpecificuser($id);

    }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->storeNewuser($data);

    }

    // public function update(array $data, $id)
    // {
    //     return $this->userRepository->updateuser($data, $id);
    // }

    // public function destroy($id)
    // {
    //     return $this->userRepository->deleteuser($id);
    // }

    public function login(array $data)
    {
        // Use auth()->attempt() instead of Auth::attempt()
        if (!$token = auth()->attempt($data)) {
            return response()->json(['error' => 'Invalid credentials'], 401)->send();
        }

        $responseToken = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => Auth::user(),
        ];

        return $responseToken;
    }

    public function me()
    {
        $token = Auth::user();
        if (!$token) {
            return response()->json('Unauthorize', 400)->send();
            exit;
        }
        return $token;
    }

    public function logout()
    {
        Auth::logout();
        return response()->json('berhasil logout', 200);
    }
}
