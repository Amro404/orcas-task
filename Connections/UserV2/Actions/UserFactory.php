<?php


namespace Connections\UserV2\Actions;


use Connections\UserV2\DataObjects\User;

class UserFactory
{

    public static function create(array $item): User
    {
        return new User(
            $item['id'],
            $item['fName'],
            $item['lName'],
            $item['email'],
            $item['picture'],
            $item['mobileNumber'],
            $item['department'],
            $item['createdAt']
        );
    }
}
