<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    }

    public function login(LoginRequest $request)
    {
        $loginRequest = User::where('phone_number', $request->phone_number)->where('pin', $request->pin)->with('resident')->first();

        if ($loginRequest != null) {
            Auth::login($loginRequest);
            $user = Auth::user();
            $resident = $loginRequest->resident;
            $success['token'] =  $user->createToken('SistemInformasiPelayananJelutung')->plainTextToken;
            $success['user'] =  $resident;
            $success['user_id'] =  $user->id;
            return response()->json(
                [
                    'result' => $success,
                    'role' => $user->getRoleNames(),
                    'message' => 'Pengguna Berhasil Masuk',
                    'status' => true
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'result' => 'error',
                    'message' => 'Akun Tidak Terdaftar',
                    'status' => false
                ],
                401
            );
        }
    }
}
