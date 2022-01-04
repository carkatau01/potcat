<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    /** @var string */
    public const API_USER = 'api_user';

    /** @var array */
    public const EXCEPTED_ROUTES = ['register', 'token'];

    public function __construct()
    {
        $this->middleware(
            'auth:api',
            ['except' => AuthController::EXCEPTED_ROUTES]
        );
    }

    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function token(AuthRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $jwtToken = $this->apiGuard()->attempt($credentials);

        if (!$jwtToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($jwtToken);
    }

    /**
     * TODO::REFACTOR AND UPDATE REGISTER METHOD
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function register(AuthRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $credentials['name'] = AuthController::API_USER;
        $credentials['password'] = bcrypt($request->password);

        $user = User::create($credentials);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->apiGuard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(
            [
                $this->apiGuard()->user(),
            ]
        );
    }

    /**
     * @return Guard
     */
    public function apiGuard(): Guard
    {
        return Auth::guard('api');
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->apiGuard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
