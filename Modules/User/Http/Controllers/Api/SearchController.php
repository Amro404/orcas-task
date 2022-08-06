<?php


namespace Modules\User\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Resources\UserResource;
use Modules\User\Services\UserService;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'data' => UserResource::collection(
                $this->userService->search($request->query('query'))
            )
        ]);
    }

}
