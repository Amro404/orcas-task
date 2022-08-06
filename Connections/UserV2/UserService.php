<?php


namespace Connections\UserV2;


use Connections\UserV2\Concerns\BuildBaseRequest;
use Connections\UserV2\Concerns\SendGetRequest;

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
