<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    /**
     * Register a new user account.
     * 
     * @param  \App\Http\Requests\RegisterUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json(['user' => $user,], 201);
    }
}
