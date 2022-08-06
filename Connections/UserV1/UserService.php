<?php


namespace Connections\UserV1;


use Connections\UserV1\Concerns\BuildBaseRequest;
use Connections\UserV1\Concerns\SendGetRequest;

class UserService
{
    use BuildBaseRequest;
    use SendGetRequest;

    protected $baseUrl;

    public function __construct(
        string $baseUrl
    )
    {
        $this->baseUrl = $baseUrl;
    }
}
