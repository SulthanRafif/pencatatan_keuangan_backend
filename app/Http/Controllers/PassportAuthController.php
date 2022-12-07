<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{
    /**
     * Registration method
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            return new RegisterResource($user);
        }

        return response()->json(['message' => 'pendaftaran akun gagal', 'status' => false], 401);
    }

    /**
     * Method login
     */
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken("LaravelAuthApp")->accessToken;
            return response()->json(['token' => $token, 'message' => 'login berhasil', 'status' => true], 200);
        } else {
            return response()->json(['error' => 'Unauthorized', 'message' => 'login gagal', 'status' => false], 401);
        }
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();

        if (Auth::check()) {
            return response('Successfully Logout');
        }
    }
}
