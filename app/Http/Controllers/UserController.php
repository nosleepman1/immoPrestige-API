<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request) {

        try {
            $data = $request->validated();

            $data['password'] = Hash::make($data['password']);
            User::create($data);

            return response()->json($data, 201);

        } catch (Exception $e) {
            return response()->json($e);
        }

    }
}
