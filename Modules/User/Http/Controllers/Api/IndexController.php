<?php


namespace Modules\User\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Resources\UserResource;
use Modules\User\Services\UserService;


class IndexController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(): JsonResponse
    {
        return response()->json([
            'data' => UserResource::collection(
                $this->userService->paginate(10)
            )
        ]);
    }
}
