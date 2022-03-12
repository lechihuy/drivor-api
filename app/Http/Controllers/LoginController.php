<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle login account.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials)) {
            $user = User::where('phone_number', $credentials['phone_number'])->first();
            $token = $user->createToken($request->phone_number);
 
            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken
            ]);
        }

        return response()->json([
            'message' => __('auth.failed')
        ], 401);
    }

    /**
     * Get the credential from given request.
     * 
     * @return \Illuminate\Http\Request
     */
    public function credentials(Request $request)
    {
        return $request->only('phone_number', 'password');
    }
}
