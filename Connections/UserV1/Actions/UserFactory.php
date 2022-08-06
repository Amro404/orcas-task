<?php


namespace Connections\UserV1\Actions;


use Connections\UserV1\DataObjects\User;

class UserFactory
{
    public static function create(array $item): User
    {
        return new User(
            $item['id'],
            $item['firstName'],
            $item['lastName'],
            $item['email'],
            $item['avatar'],
//            $item['phoneNumber'],
            $item['createdAt']
        );

    }
}
