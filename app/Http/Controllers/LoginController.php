<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth.api')->except('login');
	// }

    public function login(LoginRequest $request)
    {
    	// $userData = $request->only(['login', 'password']);
    	if(!$token = Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
    		return response()->json(['error' => 'Unauthorized'], 401);
    	}
    	return $this->respondWithToken($token);
    }

    public function user()
    {
    	return response()-> json(Auth::user());
    }

    public function logout()
    {
    	Auth::logout();
    	return $this->json(['message' => 'Successfuly logged out']);
    }

    public function refresh()
    {
    	return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token) {
    	return response()->json([
    		'access_token' => $token,
    		'type' => 'Bearer',
    		'expires_in' => \Config::get('jwt.ttl') * 60
    	]);
    }

    public function me(Request $request) {
    	$token = explode(".", $request->bearerToken());
    	$data = base64_decode($token[1]);
    	return response()->json($data);
    }
}
