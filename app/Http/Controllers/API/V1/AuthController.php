<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
  public function login(Request $request): Response {
    $data = $request->validate([ 'email' => 'required|email', 'password' => 'required' ]);

    if (!auth()->attempt($data)) {
      return response([ 'status' => 'error', 'message' => 'Nieprawidłowe dane.' ]);
    }

    $token = auth()->user()->createToken('mobile')->plainTextToken;

    return response([ 'user' => auth()->user(), 'token' => $token ]);
  }

  public function register(Request $request): Response {
    $data = $request->validate(...User::validationRules());
    $data['password'] = Hash::make($data['password']);

    $user = User::create($data);
    $token = $user->createToken('mobile')->plainTextToken;

    return response([ 'user' => $user, 'token' => $token ]);
  }

}
