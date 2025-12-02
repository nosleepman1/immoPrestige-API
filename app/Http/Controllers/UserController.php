<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request) {

        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            dd($data);

        } catch (Exception $e) {
            return response()->json($e);
        }

    }
}
