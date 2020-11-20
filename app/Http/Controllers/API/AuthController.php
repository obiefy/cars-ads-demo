<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * User login.
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validation($validator->errors()->first(), $validator->errors());
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->validation("Wrong credentials.");
        }

        $user = User::where('email', $request->email)->first();
        return $this->ok([
            'user' => new UserResource($user),
            'token' => $user->createToken('CARS-ADS')->accessToken,

        ]);
    }

    /**
     * Get User profile.
     * @return JsonResponse
     */
    public function profile()
    {
        return $this->ok(auth()->user());
    }

    /**
     * Logout User.
     * @return JsonResponse
     */
    public function logout()
    {
        foreach (auth()->user()->tokens as $token)
        {
            $token->revoke();
        }
        return $this->success("Successfully Logged out.", []);
    }

}
