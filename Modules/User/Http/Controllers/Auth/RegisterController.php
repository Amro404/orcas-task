<?php


namespace Modules\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Services\UserService;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        return response()->json(
            $this->userService->register($request->all()),
            201
        );
    }

}
