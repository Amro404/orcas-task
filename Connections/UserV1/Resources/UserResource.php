<?php


namespace Connections\UserV1\Resources;


use Connections\UserV1\Actions\UserFactory;
use Connections\UserV1\UserService;


class UserResource
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function list()
    {
        $response =  $this->userService->get(
            $this->userService->withBaseUrl(),
            "api/v1/users/users_1"
        );

        if($response->failed()) {
            return $response->toException();
        }

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
