<?php


namespace Modules\User\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Services\UserService;

class LoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(LoginRequest $request): JsonResponse
    {
        return response()->json(
            $this->userService->login($request->all()),
            202
        );
    }
}
