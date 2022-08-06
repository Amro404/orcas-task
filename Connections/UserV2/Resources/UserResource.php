<?php


namespace Connections\UserV2\Resources;


use Connections\UserV2\Actions\UserFactory;
use Connections\UserV2\UserService;
use Illuminate\Support\Collection;

class UserResource
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function list(): Collection
    {
        $response =  $this->userService->get(
            $this->userService->withBaseUrl(),
            "api/v1/users/user_2"
        );

        $collection = collect();

        foreach ($response->collect() as $user) {
            $user = UserFactory::create(
                $user,
            );

            $collection->add(
                $user,
            );
        }

        return $collection;
    }
}
